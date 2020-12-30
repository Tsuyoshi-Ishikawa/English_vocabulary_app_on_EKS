export const actions = {
  async register({ commit }, data) {
    try {
      const res = await this.$axios.$post('http://0.0.0.0:23450/api/users/register', data);
      if (res.error_message) {
        //commitでmutationを発動、第二引数にmutationで使う引数
        commit('setErrorMsg', res.error_message)
      } else {
        commit('setCurrentUserId', res.currentUserId)
        this.$router.push('/users/home')
      }
    } catch (error) {
      commit('setErrorMsg', error.message)
    }
  },
  async login({ commit }, data) {
    try {
      console.log(data)
      const res = await this.$axios.$post('http://0.0.0.0:23450/api/users/login', data);
      if (res.error_message) {
        //commitでmutationを発動、第二引数にmutationで使う引数
        commit('setErrorMsg', res.error_message)
      } else {
        commit('setCurrentUserId', res.currentUserId)
        this.$router.push('/users/home')
      }
    } catch (error) {
      commit('setErrorMsg', error.message)
    }
  },
  async logout({ commit }) {
    commit('resetCurrentUserId')
    this.$router.push('/')
  },
  async getHomeInfo({ commit }, data) {
    try {
      const res = await this.$axios.$post('http://0.0.0.0:23450/api/users/home', data);
      commit('setWords', res.words)
    } catch (error) {
      commit('setErrorMsg', error.message)
    }
  },
  async getTestInfo({ commit }, data) {
    try {
      const res = await this.$axios.$post('http://0.0.0.0:23450/api/words/test', data);
      console.log(res)
      if (res.error_message) {
        commit('setErrorMsg', res.error_message)
        this.$router.push('/users/home')
      } else {
        commit('setTestWord', res.word)
      }
    } catch (error) {
      commit('setErrorMsg', error.message)
    }
  },
  async getIndexInfo({ commit }, data) {
    try {
      const res = await this.$axios.$post('http://0.0.0.0:23450/api/words/index', data);
      console.log(res)
      commit('setOtherWords', res.words)
    } catch (error) {
      commit('setErrorMsg', error.message)
    }
  },
  async resetError({ commit }) {
    commit('resetErrorMsg')
  },
  async isSession({ commit }) {
    commit('isLogin')
  },
  async getHome() {
    this.$router.push('/users/home')
  },
  async createWord({ commit }, data) {
    try {
      const res = await this.$axios.$post('http://0.0.0.0:23450/api/words', data);
      this.$router.push('/users/home')
    } catch (error) {
      commit('setErrorMsg', error.message)
    }
  },
  async editWord({ commit }, data) {
    try {
      const res = await this.$axios.$put('http://0.0.0.0:23450/api/words', data);
      console.log(res)
      this.$router.push('/users/home')
    } catch (error) {
      commit('setErrorMsg', error.message)
    }
  },
  async deleteWord({ commit }, data) {
    try {
      //deleteだとなぜかlaravel側でdataが空になるので不採用
      // const res = await this.$axios.$delete('http://0.0.0.0:23450/api/words', data);
      const res = await this.$axios.$post('http://0.0.0.0:23450/api/words/delete', data);
      if (res.error_message) {
        commit('setErrorMsg', res.error_message)
      } else {
        commit('deleteWord', res.word_id)
      }
    } catch (error) {
      commit('setErrorMsg', error.message)
    }
  },
  async favoWord({ commit }, data) {
    try {
      const res = await this.$axios.$post('http://0.0.0.0:23450/api/words/like', data);
    } catch (error) {
      commit('setErrorMsg', error.message)
    }
  },
}

//mutationを介さないとstateの値を変更できない
export const mutations = {
  setErrorMsg(state, error_message) {
    state.error_message = error_message
  },

  setCurrentUserId(state, current_user_id) {
    state.current_user_id = current_user_id
  },

  setWords(state, words) {
    state.words = words
  },

  setOtherWords(state, words) {
    state.otherWords = words
  },

  deleteWord(state, word_id) {
    delete state.words[word_id]
  },

  setTestWord(state, word) {
    state.test_word = word
  },

  resetCurrentUserId(state) {
    state.current_user_id = 0
  },

  resetErrorMsg(state) {
    state.error_message =""
  },

  isLogin(state) {
    if (state.current_user_id === 0) {
      state.error_message = "You need register or login"
      this.$router.push('/users/login')
    }
  }
}

export const state = () => ({
  error_message: "",
  current_user_id: 0,
  words: {},
  otherWords: {},
  test_word: {}
})
