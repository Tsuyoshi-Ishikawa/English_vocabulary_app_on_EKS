<template>
  <div>
    <p @click="getHome()">戻る</p>
    <h1>word index</h1>
    <p>{{ error_message }}</p>
    <table border="1">
      <tr v-for="word in words" :key="word.id">
        <td>{{ word.English }}</td>
        <td>{{ word.Japanese}}</td>
        <td><span @click="favoWord({currentUserId: isLogin.currentUserId, wordId: word.id, type: 'add'})">お気に入り登録</span></td>
      </tr>
    </table>
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
  created() {
    this.resetError()
    this.isSession()
    this.getIndexInfo(this.isLogin)
  },
  computed: mapState({
    //これで`state => state.count` と同じ意味になる
    //mapState内では、state === this.$store.state となる
    words: "otherWords",
    error_message: "error_message"
  }),
  methods: {
    //mapActionsとすることで、index.jsの定数actionで定義されているメソッドloginを駆動?
    ...mapActions(["getHome", "resetError", "isSession", "getIndexInfo", "favoWord"])
  }
}
</script>
