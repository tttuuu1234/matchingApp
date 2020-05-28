<template>
    <div>
    <h2>Homeのヘッダー</h2>
    <router-link to="/" active-class="link--active" exact>Home</router-link>
    <router-link to="/users/1" active-class="link--active" exact>Users</router-link>
  </div>
</template>

<script>
export default {
}
</script>

<style scoped>
  .link--active {
    font-size: 24px;
  }
</style>