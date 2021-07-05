<template>
    <div>
        <h2>Artists</h2>
        <b-row>
            <b-col>
                <b-table>
                </b-table>
            </b-col>
        </b-row>
    </div>
</template>

<script>
export default {
    name:'Artists',
    data() {
        return {
            apiurl:process.env.MIX_API_URL,
            artists:[]
        }
    },
    methods: {
        // getArtists:function() {
        //     var vm = this;
        //     vm.$http.get(vm.apiurl+'/task').then(function(response){
        //         vm.artists = response.data
        //     })
        // }
    },
    mounted() {
       // this.getArtists();
    },
}
</script>

<style lang="scss" scoped>

</style>