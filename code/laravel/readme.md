## アプリ内容
英単語アプリ

## 機能
・ログイン
・英単語登録
・英単語テスト
・別ユーザーの英単語お気に入り追加

## 構造
なんちゃってクリーンアーキテクチャー。
PresenterとViewModelは採用せず、OutputDataをUseCaseInteractorからControllerに返すようにしている。
またUseCaseInteractorがごちゃつかないように、Entityを作成して必要な値をセットしてくれるDirectorクラスをUseCaseInteractorで作成して処理してもらっている、必要なかったかもしれないけど。。
controllerはlaravelに依存して良い、今回採用したDataAccessではORMに依存して良いということにした。そのほかの部分は基本的にフレームワークに依存しないように意識した。

## ログイン
laravelではAuthというログインを担当している機能があるが、こいつを使うといきなりORMを返すので、依存関係的にClean Architectureにならないと判断し採用せず。
自分でログイン機能を実装。laravelのsession機能であるrequest->sessionを利用してログインしているか判定すようにした。

## バリデーション
バリデーションはlaravelの機能にあるFormRequestを使用したり。FormRequestでできない分は、中の層に渡してDataAccessの部分で処理し、エラーが発生した場合はOutputDataにエラー内容を格納して、Controllerでエラー時、正常時のviewの出しわけをしている。

## エラー表示
ログイン同様に、request->sessionを利用。今回はrequest->session->flashを使用し、そこにエラー内容を格納し、一度は表示されるがページを更新すると見えなくなるようにした。

## DI
laravelの機能であるサービスプロバイダ、コンテナを使ってDIしようかと思ったけどやめた。インスタンスをnewする形にした。サービスプロバイダ、コンテナを使ってDIするとlaravelに依存することになり、Clean Architectureの概念に反するのかなと感じたから。間違っていたらごめんなさい。

## 環境設定
laradockを使ってコンテナを作っている。

- .env作成
cp .env/example .env

- .env編集
DB_HOST=mysql

DB_DATABASE=default
DB_USERNAME=default
DB_PASSWORD=secret

corsの問題(nuxtからlaravelに繋げない)を解決するために自前のmiddlewareを作成し、受け入れ態勢を整えた。
Middleware/Cors.php

## 参考文献
https://qiita.com/nrslib/items/a5f902c4defc83bd46b8
