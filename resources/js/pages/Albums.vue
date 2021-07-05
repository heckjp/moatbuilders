<template>
    <div>
        <h2>Albums</h2>
    </div>
</template>

<script>
export default {
    name:'Albums',
    data() {
        return {
            apiurl:process.env.MIX_API_URL,
            albums:[]
        }
    },
    methods: {
        getAlbums: function (){
            var vm = this;
            vm.$http.get(vm.apiurl+'/albums',{
                headers: {
                    Authorization: process.env.MIX_API_KEY
                }
            }).then(function(response){
                vm.albums = response.data
            })
        }
    },
    mounted() {
        this.getAlbums();
    },
}
</script>

<style lang="scss" scoped>

</style>