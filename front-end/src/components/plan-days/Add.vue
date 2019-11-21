<template >
    <div class="card">
        <div class="card-body">
      <h2>Add new  {{$data._itemName}}</h2>
      <form v-on:submit="createItem">
        <div class="form-group">
          <label for="add-day">Days</label>
          <select v-model="dayitems" class="form-control">
            <option  v-for="day in filteredDays" v-bind:value="day" v-bind:key="day.id">{{day.name}}</option>
          </select>
        </div>
        <div class="form-group">
          <label for="add-plan">Plans</label>
          <select v-model="planitems" class="form-control">
            <option  v-for="plan in filteredPlans"  v-bind:value="plan" v-bind:key="plan.id">{{plan.name}}</option>
          </select>
        </div>
        <div class="form-group">
           <label for="add-plan">Types  </label>
             <select v-model="typeitems" class="form-control">
                <option  v-for="type in filteredTypes"  v-bind:value="type"   v-bind:key="type">{{type}}</option>
              </select> 
         </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <router-link class="btn btn-default" v-bind:to="{path: $data._itemRoute}">Cancel</router-link>
      </form>
    </div>
  </div>
</template>

<script>
  // server url
  var api_url_link= "http://localhost/api/plandays/store";
  // client url
  var _itemName= "day-plan";
  var _itemRoute= "/plandays";
  
  var days_api_url_link= "http://localhost/api/days";
  var plans_api_url_link= "http://localhost/api/plans";


  export default {
      name: 'Add',
      data: function () {
      return { 
          days: [],
          dayitems: this.days, 
          types:[],
          typeitems:this.types,
          plans: [],
          planitems: this.plans, 
          _itemName,
          _itemRoute, 
          item: {plan_id: '', day_id: '',type:''}
          }
      }, mounted () {
        this.fetchData()
      },methods: {
        fetchData () {
          var vm = this
          fetch(days_api_url_link)
              .then(function(response){
                  return response.json();
              }).then(function(jsonData){
                  jsonData.data.forEach(element => {
                      vm.days.push({id: element.id, name: element.name}); 
                      vm.types = [ "body", "legs" , "hands"];
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
            var dayId = this.dayitems.id;
            var planId = this.planitems.id;
            var type = this.typeitems;
            var data = JSON.stringify(
                { 
                 plan_id: planId,
                 day_id: dayId,
                 type: type,
                 });
                 console.log(data);
                 $.post(api_url_link,   
                  data, 
                  function(data,status) { 
                      window.location.href = _itemRoute;
                  },'application/json'); 
              }
          },
      computed: {
        filteredDays: function () {
                      return this.days
        },
        filteredPlans: function () {
                      return this.plans
        },  
        filteredTypes: function () {
                      return this.types
        }
    } 
  };
  </script>
