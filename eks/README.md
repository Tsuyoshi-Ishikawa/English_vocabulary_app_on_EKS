# pod
docker_containerを持つ箱。<br>
podの中に複数・複種のcontainerを持つことができる。<br><br>

podに一つのIPアドレスが割り当てられる。<br><br>

今回のlaravelのpodは、nginxとphp-fpmの2つのコンテナを持ち、互いにunixドメインソケットでやりとりをしている。<br><br>

# deployment
podを管理するための設定。<br>どんなdocker_imageを持つpodなのか、podの個数は常に何個になって欲しいのかを管理。<br><br>


# service
podの上に来るLB。<br>serviceにも種類があり、主にclusterIP serviceとnodePort serviceがある。<br>clusterIP serviceはk8s cluster内からのみ接続可能で、nodePort serviceはk8s cluster内外から接続可能。<br><br>

# ingress
nodePort serviceの上層に位置するLB。<br>外部公開した際に、pathによって接続するserviceを切り替えるために存在する。<br><br>

# persistent volume
podの中のcontainerにvolumeしたい内容を格納する場所。<br>k8s cluster内で確保して、podが消えてもpersistent volumeにデータが残る。docker volumeの感覚に近い。<br><br>

今回の場合、laravel_podにあるnginxとphp-fpmコンテナがunixドメインソケットでやりとりをしている。そのため互いにファイルを共通化させるので共通化させるファイルをpersistent volumeに格納している。<br><br>

使い方は<br>
persistent volumeを作り、k8s cluster内に場所を確保する<br>
↓<br>
persistent volume claimをpersistent volumeから作成。
persistent volume claimはコンテナにvolumeする容量で、persistent volumeの一部である<br>
↓<br>
persistent volume claimをpodのcontainerにvolume
