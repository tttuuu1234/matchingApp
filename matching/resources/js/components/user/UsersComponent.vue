<template>
  <div>
    <p>Users</p>
    <router-link to="/users/1">User1</router-link>
    <router-link to="/users/2">User2</router-link>
    <p>User No. {{ id }}</p>
    <hr>
    <router-link 
      :to="{ 
        name:'users-posts', 
        params: { 
          id: Number(id) + 1,
        },
        query: {
          lang: 'ja'
        },
        hash: '#next-user'
      }">次のユーザー投稿内容</router-link>
    <hr>
    <router-view></router-view>
    <div style="height:700px"></div>
    <router-link id="next-user" :to="'/users/' + (Number(id) + 1) + '/posts'">次のユーザー</router-link>
    <div style="height:1400px"></div>
  </div>
</template>

<script>

export default {
  props: ["id"],
    beforeRouteEnter (to, from, next) {
      next(vm => {
        console.log(vm.id)
      })
    },
    beforeRouteUpdate (to, from, next) {
      console.log('beforeRouteUpdate')
      next()
    },
    beforeRouteLeave (to, from, next) {
      console.log('beforeRouteLeave')
      const isLeave = window.confirm('このページ離れるつもり？')
      if (isLeave) {
        next()
      } else {
        next(false)
      }
    }
}
</script>