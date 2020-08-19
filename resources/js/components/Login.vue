<template>
  <div>
      <div class="container">
          <div class="card">
              <div class="card-header">
                  LOGIN
              </div>
              <div class="card-body">
                  <form action="">
                      <div class="form-group">
                         <label for="email">E-mail</label>
                         <input class="form-control" type="text">
                      </div>
                      <div class="form-group">
                         <label for="password">Password</label>
                          <input class="form-control" type="text">
                      </div>
                      <button @click.prevent="loginUser()" class="btn btn-primary">LOGIN</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    data () {
        return {
            user: {
                email: '',
                password: ''
            }
        }
    },
    methods: {
        loginUser(){
            this.$router.push('/bank')
            // console.log("login user..", this.user);
        }
    },

}
</script>

<style>

</style>