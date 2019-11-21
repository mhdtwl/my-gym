
<template>
    <div class="card">
        <div class="card-body">
            <h2>Delete  this {{$data._itemName}}  </h2>
            <form v-on:submit="deleteItem" class="">
                <p>The action cannot be undone.</p>
                <button type="submit" class="btn btn-danger">Delete</button>
                <router-link class="btn btn-default" v-bind:to="{path: $data._itemRoute}">Cancel</router-link>
            </form>
        </div>
    </div>
</template>
<script>
 import BaseDelete from '../base-template/Delete.vue';
  // server url
var get_api_url_link= "http://localhost/api/userplans/show/";
var delete_api_url_link= "http://localhost/api/userplans/delete/";
  // client url
  var _itemName= "userplan";
  var _itemRoute= "/userplans";


export default {
    name: 'Delete',
    extends: BaseDelete,
    data: function () {
    return { _itemName,
            _itemRoute,
            item:[]
        }
    },
    mounted () {
        this.fetchData()
    },
    watch: {
        '$route': 'fetchData'
    },methods: {
      
      fetchData () {
                var vm = this
                fetch(get_api_url_link + this.$route.params.item_id)
                    .then(function(response){
                        return response.json();
                    }).then(function(jsonData){
                      vm.item = jsonData.data;
                    }); 
            },
      deleteItem: function(e) {
        e.preventDefault();
         $.delete(delete_api_url_link + this.$route.params.item_id,   
                [], 
                function(data,status) { 
                   console.log([data,status]);
                   window.location.href = _itemRoute;
                },'application/json'); 
        }
    }
};
</script>