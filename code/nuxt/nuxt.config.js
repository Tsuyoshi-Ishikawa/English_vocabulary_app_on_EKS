//環境ごとにapiのurlを変更するため
//docker-composeのnuxtの環境変数NODE_ENVで切り替えを行う
const environment = process.env.NODE_ENV || 'development';
export default {
  // Global page headers (https://go.nuxtjs.dev/config-head)
  head: {
    title: 'nuxt_code',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },

  // Global CSS (https://go.nuxtjs.dev/config-css)
  css: [
  ],

  // Plugins to run before rendering page (https://go.nuxtjs.dev/config-plugins)
  plugins: [
  ],

  // Auto import components (https://go.nuxtjs.dev/config-components)
  components: true,

  // Modules for dev and build (recommended) (https://go.nuxtjs.dev/config-modules)
  buildModules: [
    '@nuxtjs/vuetify'
  ],

  // Modules (https://go.nuxtjs.dev/config-modules)
  modules: [
    '@nuxtjs/axios',
    '@nuxtjs/proxy'
  ],

  //バックエンドのipを指定する(nginx(laradock_nginx)のportを指定)
  // 本番環境EKSの時(後者)のhostは、バックエンドのserviceの名前にする、自動で名前解決してくれる
  axios: {
    baseURL: (environment === 'development') ? 'http://0.0.0.0:23450/api' : 'http://laravel_svc/api',
  },

  // Build Configuration (https://go.nuxtjs.dev/config-build)
  build: {
  },

  server: {
    //dockerfileでhostとport設定をしたので、nuxtで受け取れるように変更する
    port: 80, // デフォルト: 3000
    host: '0.0.0.0' // デフォルト: localhost
  }
}
