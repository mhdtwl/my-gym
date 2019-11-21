
<template>
 
     <div class="card">
        <div class="card-body">
        <h2>Edit  {{$data._itemName}}</h2>
        <form v-on:submit="updateItem">
           <div class="form-group">
              <label for="add-user">Users -   {{$data.user_name}}   </label> 
              <!-- {{item.user.name}} -->
              <select v-model="useritems"  class="form-control" >
                <option  v-for="user in filteredUsers"   v-bind:value="user" v-bind:key="user.id">{{user.name}}</option>
              </select>
            </div>
            <div class="form-group">
              <label for="add-plan">Plans -    {{$data.plan_name}}  </label>
              <!-- {{item.plan.name}} -->
              <select v-model="planitems" class="form-control">
                <option  v-for="plan in filteredPlans"  v-bind:value="plan" v-bind:key="plan.id">{{plan.name}}</option>
              </select>
            </div>
            <div class="form-group">
            <label for="add-number_of_weeks">Number of weeks</label>
            <input class="form-control" type="number" min="0" id="add-number_of_weeks" v-model="item.number_of_weeks" required/>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <router-link class="btn btn-default" v-bind:to="{path: $data._itemRoute}">Cancel</router-link>
        </form>
        </div>
    </div>
</template>

<script>
  // server url
  var get_api_url_link= "http://localhost/api/userplans/show/";
  var update_api_url_link= "http://localhost/api/userplans/update/";
  // client url
  var _itemName= "userplan";
  var _itemRoute= "/userplans";
  
  var users_api_url_link= "http://localhost/api/users";
  var plans_api_url_link= "http://localhost/api/plans";

  export default {
      name: 'Edit',
      data: function () {
      return {  
          // userDefaultSelected:[],
          user_name:"",
          plan_name:"",
          users: [],
          useritems: this.users, 
          plans: [],
          planitems: this.plans, 
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
                      vm.item = jsonData.data[0];
                      vm.plan_name= vm.item.plan.name  ;
                      vm.user_name= vm.item.user.firstname + vm.item.user.lastname ; 
                       vm.useritems = vm.item.user;
                       vm.planitems = vm.item.plan;
                    }); 
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
            updateItem(e) {
              e.preventDefault();
              var item = this.item;
              var userId = this.useritems.id;
              var planId = this.planitems.id;
              var data = JSON.stringify(
                  {
                    user_id : userId,
                    plan_id: planId,
                    number_of_weeks: item.number_of_weeks//,
                });
              console.log(data);
              $.patch(update_api_url_link + this.$route.params.item_id,   
                data, 
                function(data,status) { 
                   console.log([data,status]);
                  //  window.history.back();
                  window.location.href = _itemRoute;
                },'application/json'); 
        }
      },computed: {
        
        filteredUsers: function () { 
                      return this.users
        },
        filteredPlans: function () {
                      return this.plans
        }
    } 
  };
  </script>
 