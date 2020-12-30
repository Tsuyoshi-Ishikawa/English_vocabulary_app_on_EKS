# イメージの指定
FROM node:10.14.1-alpine

# コンテナ内で cd /app しているようなもの
# これでコンテナに入った瞬間に/appにいくようになる
WORKDIR /app
COPY ./code/nuxt /app

RUN apk update && \
    apk add git && \
    npm install -g npm && \
    npm install -g vue-cli

#ENVでhostを0000にすることでどこからでも叩けるようになる?
# またdockerfileでhostやportを変更した場合は、nuxt.config.jsでhostとportの変更を記述しないといけない
ENV HOST 0.0.0.0
EXPOSE 80
