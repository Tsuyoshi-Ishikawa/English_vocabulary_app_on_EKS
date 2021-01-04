# 説明
nuxtとlaravelとdbをdockerコンテナで作成したアプリ。
EKSにデプロイする前提。
dockerやnginxやphp-fpmも含めて自分で実装したので学んだことをコメントに追加している。

# 構成
- container
dockerfileの格納場所

- volume_conf
コンテナにvolumeする設定ファイル

- code
コンテナにvolumeする実装コード

# EKSへのデプロイのためのdocker hubへのpush
docker hubにpushする際にはコードに修正を加えて作成したimageをpushする。
詳しくはdocker-compose.ymlに記述

- nuxt
command, environment, CMD(dockerfile), nuxt.config.js

# EKSでのnuxtとbackendの接続
この繋ぎ方に関してはこちらの方の記事を参考にさせていただいた。
https://github.com/famasoon/gatsby-starter-blog/blob/4c696645707d0cdd33950820b647733088dd2d43/src/pages/Golang%20%2B%20Nuxt.js%20%2B%20Kubernetes%20%E3%81%A7web%E3%82%B5%E3%83%BC%E3%83%93%E3%82%B9%E3%82%92%E4%BD%9C%E3%82%8B/index.md

https://famasoon.hatenablog.com/entry/2019/08/08/010926

# 参考
nginxやphp-fpmの構成の参考
https://github.com/Tsuyoshi-Ishikawa/nginx_phpfpm_demo

dockerの構成の参考
https://qiita.com/ucan-lab/items/5fc1281cd8076c8ac9f4

