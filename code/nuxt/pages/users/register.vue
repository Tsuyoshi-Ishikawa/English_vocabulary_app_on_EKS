<template>
  <div class="container">
      <div>
        <h1>register</h1>
        <p>{{ error_message }}</p>
        <v-form>
          <!-- v-modelでdata()と結びつく、rulesでdata()のruleと結びついてエラーを表示 -->
          <!-- typeで要素の性質を決め、 @clickでイベントを駆動、イベントのメソッドはvueのmethodsで用意-->
          <v-text-field label="名前" v-model="registerPostData.name" :rules="[rules.required]"></v-text-field>
          <v-text-field label="メールアドレス" v-model="registerPostData.email" :rules="[rules.required, rules.mail]"></v-text-field>
          <v-text-field label="パスワード" v-model="registerPostData.password" :rules="[rules.required, rules.min]" :append-icon="registerConfig.passShow ? 'mdi-eye': 'mdi-eye-off'" :type="registerConfig.passShow ? 'text': 'password'" @click:append="registerConfig.passShow = !registerConfig.passShow"></v-text-field>
          <v-text-field label="パスワード確認" v-model="registerPostData.password_confirm" :rules="[rules.match]" :append-icon="registerConfig.passConfShow ? 'mdi-eye': 'mdi-eye-off'" :type="registerConfig.passConfShow ? 'text': 'password'" @click:append="registerConfig.passConfShow = !registerConfig.passConfShow"></v-text-field>
          <v-btn @click="register(registerPostData)">登録ボタン</v-btn>
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
      registerConfig: {
        passShow: false,
        passConfShow: false
      },
      registerPostData: {
        name: null,
        email: null,
        password: null,
        password_confirm: null
      },
      rules: {
        // vはinputの中身、||で左側の処理がうまく行くかを判定し、ダメならバリデーションエラーの結果表示の右側を出す
        // ここではうまく行っているのかいないのかの判定のみで、バリデーションは行ってくれない
        //バリデーションは自前で作らんといかんhttps://jp.vuejs.org/v2/cookbook/form-validation.html
        required: v => !!v || "入力してください",
        mail: v => v == /[\w]+\@[\w]+\.[\w]+$/ || "メアドを入れてください",
        min: v => String(v).length >= 8 || "パスワードを8文字以上にしてください",
        match: v =>
          v === this.registerPostData.password || "パスワードが一致しません"
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
  methods: {
    //mapActionsとすることで、index.jsの定数actionで定義されているメソッドregisterを駆動?
    ...mapActions(["register", "resetError"])
  },
}
</script>
