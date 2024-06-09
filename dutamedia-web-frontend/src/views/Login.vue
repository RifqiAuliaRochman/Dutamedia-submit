<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header">Login Form</div>
            <div class="card-body ">
              <form @submit.prevent="login">
                <div class="mb-3 form-group">
                  <label for="email">Email address</label>
                  <input
                    type="email"
                    v-model="credential.email"
                    class="form-control"
                    id="email"
                    placeholder="Enter email"
                  />
                </div>
                <div class="mb-3 form-group">
                  <label for="password">Password</label>
                  <input
                    type="password"
                    v-model="credential.password"
                    class="form-control"
                    id="password"
                    placeholder="Enter password"
                  />
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "LoginView",
  data(){
    return {
        credential:{
            email: null,
            password: null
        }
    }
  },
  methods:{
    login(){
        this.$store.dispatch('login', this.credential).then(()=>{
            this.$router.push({
                name:'Home'
            })
        })
    }
  }
  

};
</script>
