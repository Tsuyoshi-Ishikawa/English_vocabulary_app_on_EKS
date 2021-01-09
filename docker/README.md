# 説明
英単語を登録できて、テストができるアプリ。<br>別のユーザーが登録した英単語をお気に入り登録できたりする。

![alt text](./explain_img/index.png "index")<br><br>
![alt text](./explain_img/home_page2.png "home_page2")<br>


# 構成
nuxtとlaravelとdbをdockerコンテナで作成した。<br>
EKSにデプロイする前提。<br>
dockerやnginxやphp-fpmも含めて自分で実装したので学んだことをコメントに追加している。<br><br>

![alt text](./explain_img/app_docker_structure.png "app_docker_structure")<br><br>

# ディレクトリ構成
- container<br>
dockerfileの格納フォルダ<br>

- volume_conf<br>
コンテナにvolumeする設定ファイルをおくフォルダ<br>

- code<br>
コンテナにvolumeする実装コードをおくフォルダ<br><br>

- explain_img<br>
READMEで使う説明の図をおくフォルダ<br><br>

# EKSへのデプロイのためのdocker hubへのpush
docker hubにpushする際にはコードに修正を加えて作成したimageをpushする。
詳しくは以下を確認に記述<br>

- nuxt<br>
docker-compose(command,environment), dockerfile(CMD), nuxt.config.js(baseUrl)<br>

- laravel<br>
.env(DBの周りを変更、dbhostはrdsのエンドポイントに変更), <br><br>


# nginxやphp-fpmの構成の参考
- [nginx_phpfpm_demo](https://github.com/Tsuyoshi-Ishikawa/nginx_phpfpm_demo)

- [最強のLaravel開発環境をDockerを使って構築する【新編集版】](https://qiita.com/ucan-lab/items/5fc1281cd8076c8ac9f4)