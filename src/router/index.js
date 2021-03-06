import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/tutorial',
    name: 'Tutorial',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "tutorial" */ '../views/Tutorial.vue')
  },
  {
    path: '/kekka',
    name: 'Kekka',
    component: () => import(/* webpackChunkName: "tutorial" */ '../views/Kekka.vue')
  },
  {
    path: '/share/:id',
    name: 'Share',
    component: () => import(/* webpackChunkName: "tutorial" */ '../views/Share.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
