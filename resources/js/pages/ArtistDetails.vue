<template>
    <div>

    </div>
</template>

<script>
export default {
    name:'ArtistDetails',
    data() {
        return {
            apiurl: process.env.MIX_API_URL,
            artist:[]
        }
    },
    methods: {
        getDetails(){
            var vm = this;
            vm.$http.get(vm.apiurl+'/task/'+vm.$route.params.id, {
                headers: {
                    Authorization: process.env.MIX_API_KEY
                } 
            }).then(function(response){
                vm.artist = response.data
                console.log(vm.artist)
            })
        }
    },
    mounted() {
        this.getDetails();
    },
}
</script>

<style lang="scss" scoped>

</style>