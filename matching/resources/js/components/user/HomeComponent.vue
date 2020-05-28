<template>
  <div>
    <router-view></router-view>
    <p>Home</p>
    <button @click="toUsers()">Usersへいくぜ</button>
  </div>
</template>

<script>

export default {
  methods: {
    toUsers() {
      this.$router.push("/users/1")
    }
  }
}
</script>