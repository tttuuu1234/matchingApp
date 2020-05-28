<template>
<div class="container">
  <div class="form-box">
    <form>
      <div class="">
        <label for="email">メールアドレス</label>
        <input 
          type="email" 
          class="form-parts" 
          id="email" 
          :value="registInfo.email"
          @input="bindEmail($event)"
          maxlength="255"
        >
      </div>
      <div class="">
        <label for="password">パスワード</label>
        <input 
          type="password" 
          class="form-parts" 
          id="password"
          :value="registInfo.password"
          @input="bindPassword($event)"
          minlength="8"
        >
      </div>
      <div class="">
        <label for="password-confirm">パスワード確認</label>
        <input 
          type="password" 
          class="form-parts" 
          id="password-confirm"
          :value="registInfo.password_confirmation"
          @input="bindPasswordConfirmation($event)"
          minlength="8"
        >
      </div>
      <v-btn @click="registUser">登録</v-btn>
    </form>
  </div>
</div>
</template>

<script>
import {mapActions, mapState} from "vuex"

export default {
  computed: {
    ...mapState({
      registInfo: state => state.auth.registInfo
    }),
  },
  methods: {
    ...mapActions({
      setEmail: "auth/setEmail",
      setPassword: "auth/setPassword",
      setPasswordConfirmation: "auth/setPasswordConfirmation",
      registUser: "auth/registUser"
    }),
    bindEmail(e) {
      this.setEmail(e.target.value)
    },
    bindPassword(e) {
      this.setPassword(e.target.value)
    },
    bindPasswordConfirmation(e) {
      this.setPasswordConfirmation(e.target.value)
    },
  }
}
</script>