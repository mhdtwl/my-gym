<template >
    <div class="card">
        <div class="card-body">
      <h2>Add new  {{$data._itemName}}</h2>
      <form v-on:submit="createItem">
        <div class="form-group">
          <label for="add-user">Users</label>
          <select v-model="useritems" class="form-control">
            <option  v-for="user in filteredUsers" v-bind:value="user" v-bind:key="user.id">{{user.name}}</option>
          </select>
        </div>
        <div class="form-group">
          <label for="add-plan">Plans</label>
          <select v-model="planitems" class="form-control">
            <option  v-for="plan in filteredPlans"  v-bind:value="plan" v-bind:key="plan.id">{{plan.name}}</option>
          </select>
        </div>
        <div class="form-group">
        <label for="add-number_of_weeks">Number of weeks</label>
        <input class="form-control" type="number" min="0" id="add-number_of_weeks" v-model="item.number_of_weeks" required/>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <router-link class="btn btn-default" v-bind:to="{path: $data._itemRoute}">Cancel</router-link>
      </form>
    </div>
  </div>
</template>

<script>
  // server url
  var api_url_link= "http://localhost/api/userplans/store";
  // client url
  var _itemName= "userplan";
  var _itemRoute= "/userplans";
  
  var users_api_url_link= "http://localhost/api/users";
  var plans_api_url_link= "http://localhost/api/plans";


  export default {
      name: 'Add',
      data: function () {
      return { 
          users: [],
          useritems: this.users, 
          plans: [],
          planitems: this.plans, 
          _itemName,
          _itemRoute, 
          item: {plan_id: '', user_id: '',number_of_weeks:''}
          }
      }, mounted () {
        this.fetchData()
      },methods: {
        fetchData () {
          var vm = this
          fetch(users_api_url_link)
              .then(function(response){
                  return response.json();
              }).then(function(jsonData){
                  jsonData.data.forEach(element => {
                      vm.users.push({id: element.id, name: element.firstname + element.lastname}); 
                  });
              }); 
          fetch(plans_api_url_link)
            .then(function(response){
                return response.json();
            }).then(function(jsonData){
                jsonData.data.forEach(element => {
                    vm.plans.push({id: element.id, name: element.name}); 
                });
            }); 
          },
        createItem: function(e) {
             e.preventDefault();
            var item = this.item;
            var userId = this.useritems.id;
            var planId = this.planitems.id;
            var data = JSON.stringify(
                { 
                 plan_id: planId,
                 user_id: userId,
                 number_of_weeks: item.number_of_weeks,
                 });
                 $.post(api_url_link,   
                  data, 
                  function(data,status) { 
                      window.location.href = _itemRoute;
                  },'application/json'); 
              }
          },
      computed: {
        filteredUsers: function () {
                      return this.users
        },
        filteredPlans: function () {
                      return this.plans
        }
    } 
  };
  </script>
