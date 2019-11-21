
<template>
     <div class="card">
        <div class="card-body">
        <h2>Edit  {{$data._itemName}}</h2>
        <form v-on:submit="updateItem">
            <div class="form-group">
            <label for="edit-name">First Name</label>
            <input class="form-control" id="edit-name" v-model="item.firstname" required/>
            </div>
            <div class="form-group">
            <label for="edit-name">Last Name</label>
            <input class="form-control" id="edit-name" v-model="item.lastname" required/>
            </div>
            <div class="form-group">
            <label for="edit-name">Email </label>
            <input class="form-control" id="edit-name" v-model="item.email" required/>
            </div>
            <div class="form-group">
            <label for="edit-name">Age</label>
            <input class="form-control"   type="number" min="0" id="edit-name" v-model="item.age" required/>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <router-link class="btn btn-default" v-bind:to="{path: $data._itemRoute}">Cancel</router-link>
        </form>
        </div>
    </div>
</template>

<script>
 import BaseEdit from '../base-template/Edit.vue';
  // server url
  var get_api_url_link= "http://localhost/api/users/show/";
  var update_api_url_link= "http://localhost/api/users/update/";
  // client url
  var _itemName= "user";
  var _itemRoute= "/users";
  

  export default {
      name: 'Edit',
      extends: BaseEdit,
      data: function () {
      return {  
        _itemName,
        _itemRoute,
        item: [],
        }
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
                fetch(get_api_url_link + this.$route.params.item_id)
                    .then(function(response){
                        return response.json();
                    }).then(function(jsonData){
                      vm.item = jsonData.data;
                    }); 
            },
            updateItem(e) {
              e.preventDefault();
              var item = this.item;
              var data = JSON.stringify(
                  {firstname: item.firstname,
                  lastname: item.lastname,
                  age: item.age,
                  email: item.email});

              $.patch(update_api_url_link + this.$route.params.item_id,   
                data, 
                function(data,status) { 
                   console.log([data,status]);
                  //  window.history.back();
                  window.location.href = _itemRoute;
                },'application/json'); 
        }
      }
  };
  </script>
 