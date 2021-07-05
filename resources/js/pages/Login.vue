<template>
  <b-container>
      <b-row class="d-flex justify-content-center">
          <b-col sm="12" md="6">
              <h1 class="text-center">Music App</h1>
              <b-card class="shadow mt-4">
                  <b-form>
                      <b-form-group description="Enter your username"
                      label="Username"
                      label-for="username">
                          <b-form-input id="username" v-model="form.username"></b-form-input>
                      </b-form-group>
                      <b-form-group description="Enter your password"
                      label="Password"
                      label-for="password">
                          <b-form-input type="password" id="password" v-model="form.password"></b-form-input>
                      </b-form-group>
                      <div class="mt-2 d-flex justify-content-center">
                          <b-button variant="dark" v-on:click="doLogin()">Login</b-button>
                      </div>
                      <div class="mt-2 d-flex justify-content-center">
                         <p> Don't have an account? <router-link to="/register">Register</router-link></p>
                      </div>
                  </b-form>
              </b-card>
          </b-col>
      </b-row>
  </b-container>
</template>

<script>

export default {
  name:"Login",
  data() {
      return {
          apiurl: process.env.MIX_API_URL,
          form:{
              username: '',
              password: ''
          }
      }
  },
  methods: {
      doLogin: function() {
          var vm = this;
          vm.$http.post(vm.apiurl+'/login', vm.form).then(function(response){
              console.log(response.data);
              if(response.status==200){
                vm.$cookies.set('logged',true,'30min');
                vm.$cookies.set('user',response.data,'30min');
                vm.$router.push({name: 'Home'});
              }

          }).catch(function(err){
              alert(err.response.data.msg);
          })
      }
  },
    
}
</script>

<style lang="scss" scoped>

</style>