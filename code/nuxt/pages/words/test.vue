<template>
  <div>
    <p @click="getHome()">戻る</p>
    <h1>test words</h1>
    <p>{{ error_message }}</p>
    <p>{{ test_word.English }}</p>
    <!-- htmlのタグを追加した遅時はv-bindを使う -->
    <p v-bind:style="style">{{ test_word.Japanese }}</p>
    <v-btn @click="answer()">答えを見る</v-btn>
    <v-btn @click="next()">次の問題へ</v-btn>

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
      style: "display:none;"
    }
  },
  created() {
    this.resetError()
    this.isSession()
    this.getTestInfo(this.isLogin)
  },
  computed: mapState({
    //これで`state => state.count` と同じ意味になる
    //mapState内では、state === this.$store.state となる
    test_word: "test_word",
    error_message: "error_message"
  }),
  methods: {
    answer: function () {
      this.style = 'display:block;'
    },
    next: function () {
      this.style = 'display:none;'
      this.getTestInfo(this.isLogin)
    },
    //mapActionsとすることで、index.jsの定数actionで定義されているメソッドloginを駆動?
    ...mapActions(["getHome", "resetError", "isSession", "getTestInfo"])
  }
}
</script>
