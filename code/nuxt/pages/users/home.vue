<template>
  <div>
    <h1>home</h1>
    <p>{{ error_message }}</p>
    <table border="1">
      <tr v-for="word in words" :key="word.id">
        <td>{{ word.English }}</td>
        <td>{{ word.Japanese}}</td>
        <td v-if="word.user_id === isLogin.currentUserId"><span @click="getEditWord(word)">編集</span></td>
        <td v-if="word.user_id != isLogin.currentUserId"><span @click="favoWord({currentUserId: isLogin.currentUserId, wordId: word.id, type: 'remove'})">お気に入り解除</span></td>
        <td v-if="word.user_id === isLogin.currentUserId"><span @click="deleteWord({userId: word.user_id, wordId: word.id})">X</span></td>
        <td v-if="word.user_id != isLogin.currentUserId"></td>
      </tr>
    </table>

    <div>
      <p><span @click="getCreateWord()">英単語登録ページ</span></p>
      <p><span @click="getTestWords()">英単語テストページ</span></p>
      <p><span @click="getIndexWords()">英単語投稿一覧</span></p>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import { mapState } from 'vuex'

export default {
  data() {
    return{
      isLogin: {
        currentUserId: this.$store.state.current_user_id
      },
    }
  },

  computed: mapState({
    //これで`state => state.count` と同じ意味になる
    //mapState内では、state === this.$store.state となる
    words: "words",
    error_message: "error_message"
  }),


  //初期化的な内容、ページ読み込み時に発動するので便利
  //初期の値をとって表示させる
  created() {
    this.resetError()
    this.isSession()
    this.getHomeInfo(this.isLogin)
  },
  methods: {
    getEditWord: function(word) {
      //queryを使うことでクエリパラメを送れる
      this.$router.push({ path: '/words/edit', query: {word: word}})
    },
    getCreateWord: function () {
      this.$router.push('/words/create')
    },
    getTestWords: function () {
      this.$router.push('/words/test')
    },
    getIndexWords: function () {
      //これでwords/indexに飛ぶ
      this.$router.push('/words')
    },
    //mapActionsとすることで、index.jsの定数actionで定義されているメソッドloginを駆動?
    ...mapActions(["resetError","isSession","getHomeInfo", "favoWord", "deleteWord"])
  }
}
</script>
