<template>
  <div class="container">
    <div>
      <h1>login</h1>
      <p>{{ error_message }}</p>
        <v-form>
          <v-text-field label="メールアドレス" v-model="loginPostData.email" :rules="[rules.required, rules.mail]"></v-text-field>
          <v-text-field label="パスワード" v-model="loginPostData.password" :rules="[rules.required, rules.min]" :append-icon="loginConfig.passShow ? 'mdi-eye': 'mdi-eye-off'" :type="loginConfig.passShow ? 'text': 'password'" @click:append="loginConfig.passShow = !loginConfig.passShow"></v-text-field>
          <v-btn @click="login(loginPostData)">ボタン</v-btn>
        </v-form>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import { mapState } from 'vuex'

export default {
  data() {
    return {
      loginConfig: {
        passShow: false,
        passConfShow: false
      },
      loginPostData: {
        email: null,
        password: null,
      },
      rules: {
        // vはinputの中身、||で左側の処理がうまく行くかを判定し、ダメならバリデーションエラーの結果表示の右側を出す
        // ここではうまく行っているのかいないのかの判定のみで、バリデーションは行ってくれない
        //バリデーションは自前で作らんといかんhttps://jp.vuejs.org/v2/cookbook/form-validation.html
        required: v => !!v || "入力してください",
        mail: v => v == /[\w]+\@[\w]+\.[\w]+/ || "メアドを入れてください",
        min: v => String(v).length >= 8 || "パスワードを8文字以上にしてください"
      },
    }
  },
  created() {
    this.resetError()
  },
  computed: mapState({
    //これで`state => state.count` と同じ意味になる
    //mapState内では、state === this.$store.state となる
    error_message: "error_message"
  }),
  //mapStateを使ってhtml表示するならば、this.data.error = this.error_messageという代入が必要になる
  // computed: mapState([
  // // map this.count to store.state.error_message
  // 'error_message'
  // ]),
  methods: {
    //mapActionsとすることで、index.jsの定数actionで定義されているメソッドloginを駆動?
    ...mapActions(["login", "resetError"])
  },
}
</script>
