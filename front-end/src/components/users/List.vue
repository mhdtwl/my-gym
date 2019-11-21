
<template  >
     <div class="card">
        <div class="card-body">
             <div class="row  col-12 ">
                <div class="filters  col-6">
                    <div class="form-group col-sm-3">
                    <input v-model="searchKey" placeholder="Search by name"
                            class="form-control" id="search-element" requred/>
                    </div>
                </div>
                 <div class="actions col-6 text-center">
                    <router-link class="btn btn-primary" v-bind:to="{path: $data._itemCreate}">
                    Add {{$data._itemName}}
                    </router-link>
                </div>
            </div>
        <table class="table table-striped table-responsive-sm text-center">
        <thead>
        <tr>
        <th>firstname</th>
        <th>lastname</th>
        <th>email</th>
        <th>age</th>
        <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="item in filteredItems" v-bind:key="item.id">
        <td>{{ item.firstname }}</td>
        <td>{{ item.lastname }}</td>
        <td>{{ item.email }}</td>
        <td>{{ item.age }}</td>
        <td>
            <router-link class="btn btn-warning btn-xs" v-bind:to="{path: $data._itemRoute+'/'+ item.id+'/edit'}">Edit</router-link>
            <router-link class="btn btn-danger btn-xs" v-bind:to="{path: $data._itemRoute+'/'+ item.id+'/delete'}">Delete</router-link>
        </td>
        </tr>
        </tbody>
        </table>  
        </div>
    </div>
</template>

<script>
    import BaseList from '../base-template/List.vue';
    // server url
    var api_url_link= "http://localhost/api/users";
    // client url
    var _itemName= "user";
    var _itemRoute= "/users";
    var _itemCreate= _itemRoute+"/add";
    export default {
        extends: BaseList,
        data: function () {
            return {
                _itemName,
                _itemRoute,
                _itemCreate,  
                users: [],
                items: this.users, 
                searchKey: ''
                };
            },
        mounted () {
            this.fetchData()
        },
        watch: {
            '$route': 'fetchData'
        },
        methods: {
            fetchData () {
                var vm = this
                fetch(api_url_link)
                    .then(function(response){
                        return response.json();
                    }).then(function(jsonData){
                        jsonData.data.forEach(element => {
                            vm.users.push(element) 
                        });
                    }); 
                },
        },
        computed: {
            filteredItems: function () {
                        return this.users.filter(function (item) {
                    return this.searchKey=='' || item.firstname.indexOf(this.searchKey) !== -1;
                },this);
            }
        }
    };
</script>
