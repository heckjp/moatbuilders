<template>
    <div>
        <h2 class="mt-2">Artists</h2>
        <b-row class="mt-4">
            <b-col>
                <b-table stiped :fields="fields" :items="artists"  empty-text="No record found" empty-filtered-text="No record found" head-variant="dark" show-empty>
                     <template v-slot:cell(action)="row">
                        <b-button variant="dark" class="m-2" v-b-modal="'modal-edit'" v-on:click="details(row.item.id)" ><b-icon-pencil-square /> See details</b-button>
                    </template>
                    <template #empty="scope">
                        <p>{{ scope.emptyText }}</p>
                     </template>
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
            artists:[],
            fields:[{key:'name', label: 'Name'},
            {key:'action', label: "Actions"}]
        }
    },
    methods: {
        getArtists:function() {
            var vm = this;
            vm.$http.get(vm.apiurl+'/task',{
                headers:{
                    Authorization: process.env.MIX_API_KEY
                }
            }).then(function(response){
                vm.artists = response.data
                console.log(vm.artists)
            })
        },
        details(id){
            var vm =this;
            vm.$router.push({ path: `/artists/${id}` });

        }
    },
    mounted() {
       this.getArtists();
    },
}
</script>

<style lang="scss" scoped>

</style>