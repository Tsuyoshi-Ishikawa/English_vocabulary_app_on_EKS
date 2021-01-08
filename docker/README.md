# 説明
英単語を登録できて、テストができるアプリ。<br>
nuxtとlaravelとdbをdockerコンテナで作成した。<br>
EKSにデプロイする前提。<br>
dockerやnginxやphp-fpmも含めて自分で実装したので学んだことをコメントに追加している。<br><br>

# 構成
- container<br>
dockerfileの格納場所<br>

- volume_conf<br>
コンテナにvolumeする設定ファイル<br>

- code<br>
コンテナにvolumeする実装コード<br><br>

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