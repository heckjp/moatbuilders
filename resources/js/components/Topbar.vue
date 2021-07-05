<template>
     <b-navbar toggleable="lg" type="dark" variant="dark">
    <b-navbar-brand href="#">MusicApp</b-navbar-brand>

    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

    <b-collapse id="nav-collapse" is-nav>
      
    <b-navbar-nav class="ml-auto">
        <b-nav-item><router-link to="/albums">Albums</router-link></b-nav-item>
        <b-nav-item><router-link to="/artists">Artists</router-link></b-nav-item>
        <b-nav-item disabled>Roles</b-nav-item>
        <b-nav-item disabled>Users</b-nav-item>
        <b-nav-item-dropdown right>
          <!-- Using 'button-content' slot -->
          <template #button-content>
            <em>
                {{user.fullname}}
            </em>
          </template>
          <b-dropdown-item href="#">Change password</b-dropdown-item>
          <b-dropdown-item><router-link to="/login">Logout</router-link></b-dropdown-item>
        </b-nav-item-dropdown>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</template>

<script>
export default {
   name:'Topbar',
   computed: {
    user: function() {
      return this.$cookies.get('user');
    }
  },
}
</script>

<style lang="scss" scoped>

</style>