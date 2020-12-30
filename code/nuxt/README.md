# nuxt_code

## 設定
dockerfileでhostとport設定をしたので、その設定にしてnuxtで受け取れるように変更している

```javascript

  //nuxt.config.js
  server: {
    port: 80, // デフォルト: 3000
    host: '0.0.0.0' // デフォルト: localhost
  }
  
```

## 行ったこと
- stateにuser_idを保存してsessionぽくしてる
ホントはnuxtのライブラリを使ってやるのがいいっぽい


## できていないこと
- inputに対するバリデーション。基本バリデーションはlaravel側でやる予定

## Build Setup

```bash
# install dependencies
$ npm install

# serve with hot reload at localhost:3000
$ npm run dev

# build for production and launch server
$ npm run build
$ npm run start

# generate static project
$ npm run generate
```

For detailed explanation on how things work, check out [Nuxt.js docs](https://nuxtjs.org).
