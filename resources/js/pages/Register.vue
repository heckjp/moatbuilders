<template>
     <b-container>
      <b-row class="d-flex justify-content-center">
          <b-col sm="12" md="6">
              <h1 class="text-center">Music App</h1>
              <b-card class="shadow mt-4">
                  <b-form>
                       <b-form-group description="Enter your full name"
                      label="Full Name"
                      label-for="name">
                          <b-form-input id="name" v-model="form.fullname"></b-form-input>
                      </b-form-group>
                      <b-form-group description="Enter your username"
                      label="Username"
                      label-for="login">
                          <b-form-input id="login" v-model="form.username"></b-form-input>
                      </b-form-group>
                      <b-form-group description="Enter your password"
                      label="Password"
                      label-for="password">
                          <b-form-input type="password" id="password" v-model="form.password"></b-form-input>
                      </b-form-group>
                      <b-form-group description="Select your role"
                      label="Role"
                      label-for="role_id">
                         <b-form-select id="role_id" v-model="form.role_id">
                             <b-form-select-option v-for="role in roles" v-bind:key="role.id" :value="role.id">
                                 {{role.name}}
                             </b-form-select-option>
                         </b-form-select>
                      </b-form-group>
                      <div class="mt-2 d-flex justify-content-center">
                          <b-button variant="dark" v-on:click="createAccount()">Create account</b-button>
                      </div>
               
                  </b-form>
              </b-card>
          </b-col>
      </b-row>
  </b-container>
</template>

<script>
export default {
  name:"Register",
  data() {
      return {
          apiurl: process.env.MIX_API_URL,
          form:{
              fullname:'',
              username:'',
              password:'',
              role_id: ''
          },
          roles:[]
      }
  },
  methods: {
      createAccount: function () {
          var vm = this;
          var form = vm.form;
          vm.$http.post(vm.apiurl+'/register',form).then(function(response){
              return response.data;
          })
      },
      getRole: function(){
          var vm =this;
          vm.$http.get(vm.apiurl+'/roles').then(function(response){
            vm.roles = response.data;
          })
      }
  },
  mounted() {
      this.getRole();
  },
    
}
</script>

<style lang="scss" scoped>

</style>