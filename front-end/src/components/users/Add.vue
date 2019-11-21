

<template >
  <div>
    <h2>Add new  {{$data._itemName}}</h2>
    <form v-on:submit="createItem">
      <div class="form-group">
        <label for="add-firstname">firstname</label>
        <input class="form-control" id="add-firstname" v-model="item.firstname" required/>
      </div>
      <div class="form-group">
      <label for="add-lastname">Last Name</label>
      <input class="form-control" id="add-lastname" v-model="item.lastname" required/>
      </div>
      <div class="form-group">
      <label for="add-email">Email </label>
      <input class="form-control" id="add-email" v-model="item.email" required/>
      </div>
      <div class="form-group">
      <label for="add-age">Age</label>
      <input class="form-control"  type="number" min="0" id="add-age" v-model="item.age" required/>
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
      <router-link class="btn btn-default" v-bind:to="{path: $data._itemRoute}">Cancel</router-link>
    </form>
  </div>
</template>

<script>
 import BaseAdd from '../base-template/Add.vue';
  // server url
  var api_url_link= "http://localhost/api/users/store";
  // client url
  var _itemName= "user";
  var _itemRoute= "/users";
  
  export default {
      name: 'Add',
      extends: BaseAdd,
      data: function () {
      return { _itemName,item: {firstname: '', lastname: '', email:'',age:''},  _itemRoute }
      },
      methods: {
        createItem: function(e) {
             e.preventDefault();
            var item = this.item;
            var data = JSON.stringify(
                {firstname: item.firstname,
                 lastname: item.lastname,
                 email: item.email,
                 age: item.age,
                 });

            $.post(api_url_link,   
                data, 
                function(data,status) { 
                   console.log([data,status]);
                    window.location.href = _itemRoute;
                },'application/json'); 
        }
      }
  };
  </script>
