<template>
    <div>
       
        <b-row class="mt-4">
            <b-col class="d-flex justify-content-between">
                 <h2>Albums</h2>
                <b-button class="float-right" variant="dark" v-b-modal="'modal-add'"><b-icon-plus-circle /> Add album</b-button>
            </b-col>
        </b-row>
         <b-row class="mt-4">
            <b-col>
                <b-table striped :fields="fields" :items="albums"  empty-text="No record found" empty-filtered-text="No record found" head-variant="dark" show-empty>
                     <template v-slot:cell(action)="row">
                        <b-button variant="dark" class="m-2" v-b-modal="'modal-edit'" v-on:click="edit(row.item)" ><b-icon-pencil-square />Edit</b-button>
                        <span v-if="isAdm">
                            <b-button variant="dark" @click="deleteAlbum(row.item.id)"><b-icon-trash /> Delete</b-button>
                        </span>
                    </template>
                    <template #empty="scope">
                        <p>{{ scope.emptyText }}</p>
                     </template>
                </b-table>
            </b-col>
        </b-row>

          <b-modal id="modal-add" hide-backdrop @ok="insertAlbum()">
        <b-form>
            <b-form-group label="Name: " label-for="name">
                <b-form-input id="name" v-model="form.name" />
            </b-form-group>
            <b-form-group label="Year: " label-for="year">
                <b-form-input id="year" v-model="form.year" />
            </b-form-group>
             <b-form-group
                      label="Artist"
                      label-for="artist_id">
                         <b-form-select id="artist_id" v-model="form.artist_id">
                             <b-form-select-option v-for="artist in artists" v-bind:key="artist.id" :value="artist.id">
                                 {{artist.name}}
                             </b-form-select-option>
                         </b-form-select>
             </b-form-group>
        </b-form>
    </b-modal>
    <b-modal id="modal-edit" hide-backdrop @ok="editAlbum()">
        <b-form>
             <b-form-group label="Name: " label-for="name">
                <b-form-input id="name" v-model="formEdit.name" />
            </b-form-group>
            <b-form-group label="Year: " label-for="year">
                <b-form-input id="year" v-model="formEdit.year" />
            </b-form-group>
             <b-form-group
                      label="Artist"
                      label-for="artist_id">
                         <b-form-select id="artist_id" v-model="formEdit.artist_id">
                             <b-form-select-option v-for="artist in artists" v-bind:key="artist.id" :value="artist.id">
                                 {{artist.name}}
                             </b-form-select-option>
                         </b-form-select>
             </b-form-group>
        </b-form>
    </b-modal>
    </div>
</template>

<script>
export default {
    name:'Albums',
    data() {
        return {
            apiurl:process.env.MIX_API_URL,
            albums:[],
            artists:[],
            fields:[{key:'name', label: 'Name'},
            {key:'year',label: 'Year' },
            {key:'artist_id', label:'Artist ID'},
            {key:'action', label: "Actions"}],
           form: 
                {name:null},
            formEdit:{
                name:null
            }
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
        },
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
        }
        ,
         insertAlbum: function(){
           var vm= this;
            vm.$http.post(vm.apiurl+'/albums',vm.form,{
                headers:{
                    Authorization: process.env.MIX_API_KEY
                }
            }).then(function(response){
                vm.$swal.fire('Album added!','','success');
                vm.getAlbums();
            }).catch(function(err){
                console.log(err,'erro');
            })
        },
        edit:function(item){
            var vm=this;
            vm.formEdit= vm.lodash.cloneDeep(item);
            console.log(vm.formEdit,'editform');
        },
        editAlbum: function(){
           var vm= this;
            vm.$http.put(vm.apiurl+'/albums/'+vm.formEdit.id,vm.formEdit,{
                headers:{
                    Authorization: process.env.MIX_API_KEY
                }
                }).then(function(response){
                vm.$swal.fire('Album updated!','','success');
                vm.getAlbums();
            }).catch(function(err){
                console.log(err);
            })
        },
        deleteAlbum: function(id){
            var vm=this;
            this.$swal.fire({
                title: 'Delete album?',
                text: "The album with code "+id +" will be removed permanently",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText:'No'
}).then(response=>{
                if(response.isConfirmed) {
                vm.$http.delete(vm.apiurl+'/albums/'+id,{
                headers:{
                    Authorization: process.env.MIX_API_KEY
                }}).then(function(response){
                    vm.$swal.fire('Album deleted!','','success');
                    vm.getAlbums();
                }).catch(function(err){
                    console.log(err)
                })
                }
            }).catch(err =>{
                console.log(err)
            })
            
        }
    },
    mounted() {
        this.getAlbums();
        this.getArtists()
    },
    computed: {
        isAdm : function() {
            var vm = this;
            let user = vm.$cookies.get('user');
            if(user.role_id==1) {
                return true
            } else {
                return false
            }

        }
    },
}
</script>

<style lang="scss" scoped>

</style>