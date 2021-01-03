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
command,environment,CMD(dockerfile)

# 参考
nginxやphp-fpmの構成の参考
https://github.com/Tsuyoshi-Ishikawa/nginx_phpfpm_demo

dockerの構成の参考
https://qiita.com/ucan-lab/items/5fc1281cd8076c8ac9f4

