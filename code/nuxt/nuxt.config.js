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
  axios: {
    baseURL: 'http://0.0.0.0:23450/api',
  },

  // publicRuntimeConfig: {
  //   axios: {
  //     browserBaseURL: process.env.BROWSER_BASE_URL
  //   }
  // },

  // privateRuntimeConfig: {
  //   axios: {
  //     baseURL: process.env.BASE_URL
  //   }
  // },

  // axios: {
  //   proxy: true // Can be also an object with default options
  // },

  // proxy: {
  //   '/api/': 'http://0.0.0.0:23450/api'
  // },



  // Build Configuration (https://go.nuxtjs.dev/config-build)
  build: {
  },

  server: {
    //dockerfileでhostとport設定をしたので、nuxtで受け取れるように変更する
    port: 80, // デフォルト: 3000
    host: '0.0.0.0' // デフォルト: localhost
  }
}
