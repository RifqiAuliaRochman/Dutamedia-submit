import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeView from '../views/HomeView.vue'
import store from '../store/'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: HomeView,
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/about',
    name: 'About',
    component: () => import('../views/AboutView.vue'),
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/login',
    name: 'LoginView',
    component: () => import('../views/Login.vue'),
    meta: {
      visitor: true
    }
  },
  {
    path: '/register',
    name: 'RegisterView',
    component: () => import('../views/Register.vue'),
    meta: {
      visitor: true
    }
  },
  {
    path: '/logout',
    name: 'LogoutFunc',
    component: () => import('../components/Logout.vue'),
    meta: {
      requiresAuth: true
    }
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) { 
    if (!store.getters.loggedIn) {
      next({
        name: 'LoginView'
      })
    } else {
      next()
    }
  } else if (to.matched.some(record => record.meta.visitor)) { 
    if (store.getters.loggedIn) {
      next({
        name: 'Home'
      })
    } else {
      next()
    }
  } 
  else {
    next()
  }
})

export default router
