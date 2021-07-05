<template>
  <b-container>
    <Topbar></Topbar>
      <b-row>
          <b-col>
            <router-view></router-view>
          </b-col>
      </b-row>
  </b-container>
</template>

<script>
import Topbar from '../components/Topbar.vue'
export default {
  name:"Home",
  components:{
    Topbar
  },
  data() {
    return {
  
    }
  },
  
    
}
</script>

<style lang="scss" scoped>

</style>