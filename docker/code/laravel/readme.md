# 内容
英単語アプリのバックエンド。
フレームワークにlaravelを使用して、clean architectureで実装している

機能は
- ログイン
- 英単語登録、編集、削除
- 英単語テスト
- 別ユーザーの英単語お気に入り追加

# 構造
なんちゃってクリーンアーキテクチャー。
PresenterとViewModelは採用せず、OutputDataをUseCaseInteractorからControllerに返すようにしている。
またUseCaseInteractorがごちゃつかないように、Entityを作成して必要な値をセットしてくれるDirectorクラスをUseCaseInteractorで作成して処理してもらっている、必要なかったかもしれないけど。。
controllerはlaravelに依存して良い、今回採用したDataAccessではORMに依存して良いということにした。そのほかの部分は基本的にフレームワークに依存しないように意識した。

# ディレクトリ構成

# その他こだわったところ
### ログイン
laravelではAuthという機能でログインを実装できるが、こいつを使うといきなりORMを返すので、依存関係的にClean Architectureにならないと判断し採用せず。
自分でログイン機能を実装。laravelのsession機能であるrequest->sessionを利用してログインしているか判定すようにした。

### バリデーション
バリデーションはlaravelの機能にあるFormRequestを使用したり。FormRequestでできない分は、中の層に渡してDataAccessの部分で処理し、エラーが発生した場合はOutputDataにエラー内容を格納して、Controllerでエラー時、正常時のviewの出しわけをしている。

### DI
laravelの機能であるサービスプロバイダ、コンテナを使ってDIしようかと思ったけどやめた。インスタンスをnewする形にした。サービスプロバイダ、コンテナを使ってDIするとlaravelに依存することになり、Clean Architectureの概念に反するのかなと感じたから。間違っていたらごめんなさい。

# 設定
### .env編集
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=admin
DB_PASSWORD=password

AWSにデプロイするdocker_imagesを作成する場合はDB_HOSTをRDSのエンドポイントに設定。

### cors policyに反する問題を解消
cors policyとは、オリジン (ドメイン、プロトコル、ポート番号) 間でのやりとりの約束。

nuxtのオリジン(0.0.0.0)からlaravelのオリジン(0.0.0.0:23450)へ接続するとcors policyに反するため接続できなかった。
```
Access to XMLHttpRequest at 'http://0.0.0.0:23450/api/register' from origin 'http://0.0.0.0' has been blocked by CORS policy: No 'Access-Control-Allow-Origin' header is present on the requested resource.
```
これを解決するために、自前のCorsというmiddlewareを作成し受け入れ態勢を整えた。

- [CORSについて](https://qiita.com/Tsuyozo/items/6769f616b478726a5188)

# 参考文献
- [実装クリーンアーキテクチャ](https://qiita.com/nrslib/items/a5f902c4defc83bd46b8)

- [【プログラミング】実践クリーンアーキテクチャ 音ズレ修正Ver.](https://www.youtube.com/watch?v=BvzjpAe3d4g)

- [Clean Architecture 達人に学ぶソフトウェアの構造と設計](https://www.amazon.co.jp/Clean-Architecture-%E9%81%94%E4%BA%BA%E3%81%AB%E5%AD%A6%E3%81%B6%E3%82%BD%E3%83%95%E3%83%88%E3%82%A6%E3%82%A7%E3%82%A2%E3%81%AE%E6%A7%8B%E9%80%A0%E3%81%A8%E8%A8%AD%E8%A8%88-Robert-C-Martin/dp/4048930656)
