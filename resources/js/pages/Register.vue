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
                          <b-form-input id="name" v-model="form.name"></b-form-input>
                      </b-form-group>
                      <b-form-group description="Enter your username"
                      label="Username"
                      label-for="login">
                          <b-form-input id="login" v-model="form.login"></b-form-input>
                      </b-form-group>
                      <b-form-group description="Enter your password"
                      label="Password"
                      label-for="password">
                          <b-form-input id="password" v-model="form.password"></b-form-input>
                      </b-form-group>
                      <b-form-group description="Cofirm your password"
                      label="Repeat Password"
                      label-for="confirm">
                          <b-form-input id="confirm" v-model="form.confirm"></b-form-input>
                      </b-form-group>
                      <b-form-group description="Select your role"
                      label="Role"
                      label-for="role">
                         <b-form-select :options="roles"></b-form-select>
                      </b-form-group>
                      <div class="mt-2 d-flex justify-content-center">
                          <b-button variant="dark">Create account</b-button>
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
          form:{
              name:'',
              login:'',
              password:'',
              confirm:'',
              role: ''
          },
          roles:{}
      }
  },
  methods: {
      createAccount: function () {

      },
      getRole: function(){
          console.log( 'search for role')
      }
  },
  mounted() {
      this.getRole();
  },
    
}
</script>

<style lang="scss" scoped>

</style>