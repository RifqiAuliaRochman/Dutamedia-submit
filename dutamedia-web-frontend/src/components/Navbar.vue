<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <router-link class="navbar-brand" :to="{name:'Home'}">DUTAMEDIA</router-link>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <router-link class="nav-link" :to="{name:'Home'}"> Home </router-link>
        </li>
        <li class="nav-item" v-if="loggedIn">
          <router-link class="nav-link" :to="{name:'About'}"> About </router-link>
        </li>
        <li class="nav-item" v-if="!loggedIn">
          <router-link class="nav-link" :to="{name:'LoginView'}"> Login </router-link>
        </li>
        <li class="nav-item" v-if="!loggedIn">
          <router-link class="nav-link" :to="{name:'RegisterView'}"> Register </router-link>
        </li>
        <li class="nav-item" v-if="loggedIn">
          <router-link class="nav-link" :to="{name:'LogoutFunc'}"> Logout </router-link>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  name: "AppNavbar",
  computed:{
    loggedIn(){
      return this.$store.getters.loggedIn
    }
  }
};
</script>
