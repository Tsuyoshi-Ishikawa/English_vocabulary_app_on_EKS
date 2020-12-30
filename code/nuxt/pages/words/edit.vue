<template>
  <div>
    <p @click="getHome()">戻る</p>
    <h1>edit word</h1>
    <p>{{ error_message }}</p>
    <v-form>
      <v-text-field label="日本語" v-model="wordData.Japanese" :rules="[rules.required]"></v-text-field><v-text-field label="英語" v-model="wordData.English" :rules="[rules.required]"></v-text-field>
      <v-btn @click="editWord(wordData)">変更</v-btn>
    </v-form>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import { mapState } from 'vuex'

export default {
  data() {
    return {
      wordData: {
        userId: this.$store.state.current_user_id,
        //$route.queryでクエリパラメを受け取る
        wordId: this.$route.query.word.id,
        Japanese: this.$route.query.word.Japanese,
        English: this.$route.query.word.English
      },
      rules: {
        required: v => !!v || "入力してください"
      },
    }
  },
  created() {
    // console.log(this.$route.query.word)
    this.resetError()
    this.isSession()
  },
  computed: mapState({
    //これで`state => state.count` と同じ意味になる
    //mapState内では、state === this.$store.state となる
    error_message: "error_message"
  }),
  methods: {
    //mapActionsとすることで、index.jsの定数actionで定義されているメソッドloginを駆動?
    ...mapActions(["getHome", "editWord", "resetError", "isSession"])
  }
}
</script>
