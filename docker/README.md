# 説明
英単語を登録できて、テストができるアプリ。<br>
nuxtとlaravelとdbをdockerコンテナで作成した。<br>
EKSにデプロイする前提。
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

# EKSでのnuxtとbackendの接続の参考
nuxt→golangをk8sで実装<br>
https://github.com/famasoon/gatsby-starter-blog/blob/4c696645707d0cdd33950820b647733088dd2d43/src/pages/Golang%20%2B%20Nuxt.js%20%2B%20Kubernetes%20%E3%81%A7web%E3%82%B5%E3%83%BC%E3%83%93%E3%82%B9%E3%82%92%E4%BD%9C%E3%82%8B/index.md<br>

https://famasoon.hatenablog.com/entry/2019/08/08/010926<br><br>

# その他参考参考
nginxやphp-fpmの構成の参考<br>
https://github.com/Tsuyoshi-Ishikawa/nginx_phpfpm_demo<br>

dockerの構成の参考<br>
https://qiita.com/ucan-lab/items/5fc1281cd8076c8ac9f4