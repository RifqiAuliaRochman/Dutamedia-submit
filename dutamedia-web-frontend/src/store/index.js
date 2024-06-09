import axios from 'axios'
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

axios.defaults.baseURL = "http://127.0.0.1:8000/api"

export default new Vuex.Store({
  state: {
    token: localStorage.getItem('accessToken') || null
  },
  getters: {
    loggedIn(state){
      return state.token !== null
    }
  },
  mutations: {
    setToken(state, token){
      state.token = token
    },
    removeToken(state){
      state.token = null
    }
  },
  actions: {
    register(context, data){
      return new Promise((resolve, reject)=>{
        axios.post('/register', {
          name: data.name,
          email: data.email,
          password: data.password
        }).then(res=>{
          resolve(res.data)
        }).catch(error=>{
          reject(error)
        })
      })
    },
    login(context, credential){
      return new Promise((resolve, reject)=>{
        axios.post('/login', {
          email: credential.email,
          password: credential.password
        }).then(res=>{
          localStorage.setItem('accessToken', res.data.data.access_token)
          context.commit('setToken', res.data.data.access_token)
          resolve(res)
        }).catch(error=>{
          reject(error)
        })
      })
    },
    logout(context){
      axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.token
      
      return new Promise((resolve, reject)=>{
        axios.post('logout').then(res=>{          
          localStorage.removeItem('accessToken')
          context.commit('removeToken')
          resolve(res)
        }).catch(error=>{
          reject(error)
        })
      })
    }
  },
  modules: {}
})
