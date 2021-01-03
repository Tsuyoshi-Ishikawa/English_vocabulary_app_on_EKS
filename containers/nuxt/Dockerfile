# イメージの指定
FROM node:10.14.1-alpine

# コンテナ内で cd /app しているようなもの
# これでコンテナに入った瞬間に/appにいくようになる
WORKDIR /app
COPY ./code/nuxt /app

RUN apk update && \
    apk add git && \
    npm install -g npm && \
    npm install -g vue-cli && \
    npm install && \
    npm run build
#RUNでインストール作業やビルド作業行なっても問題なし、devやstartでサーバーを起動するのはコンテナが立ち上がった時に行うようにする

#ENVでhostを0000にすることでどこからでも叩けるようになる?
# またdockerfileでhostやportを変更した場合は、nuxt.config.jsでhostとportの変更を記述しないといけない
ENV HOST 0.0.0.0
EXPOSE 80

#本番で動くためにstartを起動させないといけない、開発ではdev
# CMD  npm run start
#docker hubにpushをするimageを作成するときは上記をコメントインする
#またdocker-compose.ymlのcommand: sh -c "npm install && npm run dev"はコメントアウトする

#経緯
#CMD  npm run startなし+dockerfileでcommand: sh -c "npm install && npm run dev"の場合
#kubernetesでpodが立ち上がらずcompletedになりそこから再起動を繰り返すCrashLoopBackOffになる

#CMD  npm run startなし+dockerfileでcommand: sh -c "npm run start"やcommand: npm run startの場合
#理由はわからないが(発動タイミングがCMDとcommandで異なる?)
#kubernetesでpodが立ち上がらずcompletedになりそこから再起動を繰り返すCrashLoopBackOffになる