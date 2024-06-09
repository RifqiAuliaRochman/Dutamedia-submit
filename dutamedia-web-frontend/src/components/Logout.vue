<template>
    <!-- <div class="container">
      <h1>Logout</h1>
    </div> -->
    <div></div>
  </template>
  
  <script>
  
  export default {
    name: 'LogoutFunc',
    created(){
        this.$store.dispatch('logout').then(()=>{
            this.$router.push({
                name: 'LoginView'
            })
        })
    }
  }
  </script>
  