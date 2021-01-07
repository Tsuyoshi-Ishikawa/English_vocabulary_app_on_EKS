デプロイ手順

# NginxのIngress controllerをhelm chartを通して作成する
Ingress controllerはingressリソースを動かすのに必要な物<br>
https://kubernetes.io/ja/docs/concepts/services-networking/ingress-controllers/<br><br>

まずIngress Controllerをおくnamespaceを作成
```
kubectl create namespace nginx-ingress-controller
```
<br>
ingress-nginx/ingress-nginxのremoを追加

```
helm repo add ingress-nginx https://kubernetes.github.io/ingress-nginx
helm repo update
```
<br>
ingress-nginx/ingress-nginxのインストール(作成すること)

```
helm install nginx-ingress-controller ingress-nginx/ingress-nginx -n nginx-ingress-controller
```

<br>
確認方法

```
kubectl get pod,svc,deploy -n nginx-ingress-controller
```

<br>
間違って作ってしまったhelmチャートの削除方法

```
helm listで今デプロイされたチャートを確認し
helm uninstall チャート
```

# ingressリソースをymlで作成してHTTPパスやホストによるL7ロードバランスする方法
実際にingressを定義する

```
cd eks
kubectl apply -f ingress.yml
```  

# nuxtデプロイ
### docker imagesを作成してdocker hubにpush
この前に本番デプロイ用にコードを変更しておく<br>
↓<br>
docker imagesを作成してdocker hubにpush<br><br>

### deployment作成コマンド
imageにはdockerhubの内容を指定
```
kubectl run \
  --image tsuyozo/nuxt_k8s_demo:latest \
  --port 80 nuxt \
  --dry-run \
  -o yaml > deployment_nuxt.yaml

kubectl apply -f deployment_nuxt.yaml
```
--dry-run -o yamlとすることでymlでの定義が作れてk8s_declaretive_define/deployment_nuxt.yamlができる<br><br>

### service作成コマンド
```
kubectl expose deploy nuxt \
  --port 80 \
  --target-port 80 \
  --type NodePort \
  --dry-run -o yaml > service_nuxt.yaml

kubectl apply -f service_nuxt.yaml
```

docker-composeで定義したコンテナが8080:80になっているならば、
nodePortServiceのportを8080、podのportを80にすれば良い

# RDS作成
eksのためのRDSをcloudformationを使って作成、手動でやっても良い<br>
https://github.com/Tsuyoshi-Ishikawa/rdsCfn_for_eks<br><br>

# workernodeに入り、mysqlをインストールしRDSでdb作成
以下を参考にして行う<br>
https://noumenon-th.net/programming/2020/04/10/ec2-rds-laravel/

sshログインして
<br>
```
sudo yum update -y
sudo yum -y install mysql
mysql -h RDSエンドポインと -P 3306 -u admin -p
show databases;
CREATE DATABASE laravel;
use laravel;
```

# nginxとphp-fpmのためのvolume作成
今回バックエンド側のpodで使用するnginxとphp-fpmはunixドメインソケットでやりとりしている<br>
https://qiita.com/kotarella1110/items/634f6fafeb33ae0f51dc<br>
nignx側の/var/run/php-fpm/php-fpm.sockとphp-fpm側の/var/run/php-fpm/php-fpm.sockを共通化させることでやりとりができるようになる<br>
共通化させるため場所をk8sクラスタ内で確保しないといけない<br>
↓<br>
k8sのPersistentVolumeとPersistentVolumeClaimを使って共通化する場所を確保して、<br>
それをバックエンドpodのnginxコンテナとphp-fpmコンテナにvolumeしてあげる<br><br>


workernodeにsshして共通化する場所を作り
```
sudo mkdir /var/run/php-fpm
```
<br>
共通化できるようにPersistentVolume→PersistentVolumeClaimを作成

```
kubectl apply -f persistent_volume.yml
kubectl apply -f persistent_volume_claim.yml
```

# IRSAによってnginxとphp-fpmのpodにRDSにアクセスできる権限を与える

### OIDCプロバイダーを、eksクラスターに紐付け
```
eksctl utils associate-iam-oidc-provider \
            --region=ap-northeast-1 \
            --cluster=eks-from-eksctl \
            --approve
```

### IAM Roleの権限を持ったService Accountを作成
RDSに読み書きできるiamポリシーとservice account名とクラスタを指定して、Service Accountを作成

```
eksctl create iamserviceaccount \
                --name rds-service-account \
                --namespace default \
                --cluster eks-from-eksctl \
                --attach-policy-arn arn:aws:iam::aws:policy/AmazonRDSDataFullAccess \
                --approve \
                --region ap-northeast-1
```

# nginxとphp-fpmデプロイ
### docker imagesを作成してdocker hubにpush
その前にRDSエンドポイントの情報などを設定してデプロイするためにコードを修正する
<br>↓
<br>docker imagesを作成してdocker hubにpush<br><br>

### Deployment
imageにはdockerhubの内容を指定<br>
またservice accountをrds-service-accountに指定することでこのpodがRDSにアクセスできるようにする。<br>
またnginxとphp-fpmがunixドメインソケットでやりとりできるように、PersistentVolumeClaimを各コンテナにvolumemountする。<br>
詳しくはk8s_declaretive_define/deployment_laravel.ymlを見ればわかる<br>

またmigrateをしていないならばphp-fpmに入ってしてあげる<br>
```
php artisan migrate
php artisan db:seed
```

### Service
バックエンドのサービスをclusterIP serviceにしようとしたが、うまく行かなかったのでnodeport serviceにしてingressから接続できるようにした。<br>
フロントのnuxtから「EKSのドメイン/api」でアクセスされると、バックエンドにつながるようになっている