<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header">Register Form</div>
          <div class="card-body">
            <form @submit.prevent="register">
              <div class="mb-3 form-group">
                <label for="name">Name</label>
                <input
                  type="text"
                  v-model="formData.name"
                  class="form-control"
                  id="name"
                  placeholder="Enter name"
                />
              </div>
              <div class="mb-3 form-group">
                <label for="email">Email address</label>
                <input
                  type="email"
                  v-model="formData.email"
                  class="form-control"
                  id="email"
                  placeholder="Enter email"
                />
              </div>
              <div class="mb-3 form-group">
                <label for="password">Password</label>
                <input
                  type="password"
                  v-model="formData.password"
                  class="form-control"
                  id="password"
                  placeholder="Enter password"
                />
              </div>
              <button type="submit" class="btn btn-primary">Register</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "RegisterView",
  data() {
    return {
      formData: this.initForm(),
    };
  },
  methods: {
    register() {
      this.$store.dispatch("register", this.formData).then(() => {
        this.$router.push({
          name: "LoginView",
        });
      });
    },

    initForm(){
        return {
        name: null,
        email: null,
        password: null,
      }
    }
  },
};
</script>
