// import Vue from "vue";
// import Router from "vue-router"
// import Home from "./components/user/HomeComponent.vue";
// import Users from "./components/user/UsersComponent.vue";
// import Posts from "./components/user/PostsComponent.vue";
// import Profile from "./components/user/ProfileComponent.vue";
// import HeaderHome from "./components/user/HeaderHome.vue";
// import HeaderUsers from "./components/user/HeaderUsers.vue";
// import Register from "./components/user/Register.vue";

// const Home = () => import("./components/user/HomeComponent.vue");
// const Users = () => import("./components/user/UsersComponent.vue");
// const Posts = () => import("./components/user/PostsComponent.vue");
// const Profile = () => import("./components/user/ProfileComponent.vue");
// const HeaderHome = () => import("./components/user/HeaderHomeComponent.vue");
// const HeaderUsers = () => import("./components/user/HeaderUsersComponent.vue");

// Vue.use(Router);

import Vue from 'vue';
import Router from 'vue-router';
// user-component
import Register from "./components/user/Register.vue";
import HeaderAuth from "./components/user/HeaderAuth.vue";

// admin-component


Vue.use(Router);

export default new Router ({
  mode: "history",
  routes: [
    {
      path: "/",
      components: {
				default: Register,
				header: HeaderAuth
			}
    }
  ]
})
// export default new Router({
// 	mode: "history",
// 	routes: [
// 		{
// 			path: "/", 
// 			components: {
// 				default: Home,
// 				header: HeaderHome
// 			},
// 		},
// 		{
// 			path: "/users/:id", 
// 			components: {
// 				default: Users,
// 				header: HeaderUsers
// 			}, 
// 			props: {
// 				default: true,
// 				header: false
// 			},
// 			children: [
// 				{ path: "posts/", component: Posts, name: "users-posts"},
// 				{ path: "profile/", component: Profile}
// 			]
// 		},
// 		{
// 			path: "*",
// 			redirect: "/users/1"
// 		}
// 	],
// 	scrollBehavior (to, from, savedPosition) {
// 		if (savedPosition) {
// 			return savedPosition
// 		}
// 		if (to.hash) {
// 			return {
// 				selector: to.hash,
// 				offset: {x:0, y:100}
// 			}
// 		}
// 	}
// })