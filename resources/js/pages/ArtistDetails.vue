<template>
    <div>
        <b-row>
            <b-col>
                <h2>Discography of {{artist.name}}</h2>
            </b-col>
        </b-row>
        <b-row class="mt-4">
            <b-col>
                <b-list-group v-if="albums.length>0">
                    <b-list-group-item v-for="album in albums" v-bind:key="album.id" class="d-flex justify-content-between">
                        <span>{{album.name}}</span>
                        <b-badge variant="secondary">{{album.year}}</b-badge>
                    </b-list-group-item>
                </b-list-group>
                <span v-else>
                    <b-alert variant="info" show> No album found for this artist</b-alert>
                    </span> 
            </b-col>
        </b-row>
    </div>
</template>

<script>
export default {
    name:'ArtistDetails',
    data() {
        return {
            apiurl: process.env.MIX_API_URL,
            artist:[],
            albums:[]
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
                vm.albums= vm.artist.album;

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