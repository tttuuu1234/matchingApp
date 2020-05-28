export const auth = {
  namespaced: true,
  state: {
    registInfo: {
      email: "",
      password: "",
      password_confirmation: ""
    }
  },
  getters: {
  },
  // actionsから呼び出されたmutationsでstateの中身を書き換える
  mutations: {
    setEmail(state, email) {
      state.registInfo.email = email
    },
    setPassword(state, password) {
      state.registInfo.password = password
    },
    setPasswordConfirmation(state, password_confirmation) {
      state.registInfo.password_confirmation = password_confirmation
    }
  },
  // actionsで非同期処理(バックエンドにapiを投げたり、同期も可能)をして、mutationsを呼び出す
  actions: {
    setEmail({commit}, email) {
      commit("setEmail", email)
    },
    setPassword({commit}, password) {
      commit("setPassword", password)
    },
    setPasswordConfirmation({commit}, password_confirmation) {
      commit("setPasswordConfirmation", password_confirmation)
    },
    // user登録
    async registUser({state}) {
      console.log(state.registInfo.email)
      const registInfo = state.registInfo
      try {
        await axios.post("/api/register", {
          email: registInfo.email,
          password: registInfo.password,
          password_confirmation: registInfo.password_confirmation
        })
      } catch (error) {
        console.log(error)
      }
    }
  }
}