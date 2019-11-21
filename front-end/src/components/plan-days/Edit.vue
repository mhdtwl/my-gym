
<template>
 
     <div class="card">
        <div class="card-body">
        <h2>Edit  {{$data._itemName}}</h2>
        <form v-on:submit="updateItem">
           <div class="form-group">
              <label for="add-day">Days -   {{$data.day_name}}   </label> 
              <!-- {{item.day.name}} -->
              <select v-model="dayitems"  class="form-control" >
                <option  v-for="day in filteredDays"   v-bind:value="day" v-bind:key="day.id">{{day.name}}</option>
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
            <label for="add-type">Type {{$data.type}}</label>
             <div class="form-group">
              <select v-model="typeitems" class="form-control">
                  <option  v-for="type in filteredTypes"  v-bind:value="type"   v-bind:key="type">{{type}}</option>
                </select> 
              </div>
            <!-- <input class="form-control" type="number" min="0" id="add-type" v-model="item.type" required/> -->
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <router-link class="btn btn-default" v-bind:to="{path: $data._itemRoute}">Cancel</router-link>
        </form>
        </div>
    </div>
</template>

<script>
  // server url
  var get_api_url_link= "http://localhost/api/plandays/show/";
  var update_api_url_link= "http://localhost/api/plandays/update/";
  // client url
  var _itemName= "day-plan";
  var _itemRoute= "/plandays";
  
  var days_api_url_link= "http://localhost/api/days";
  var plans_api_url_link= "http://localhost/api/plans";

  export default {
      name: 'Edit',
      data: function () {
      return {  
          // dayDefaultSelected:[],
          day_name:"",
          plan_name:"",
          type_name:"",
          types:[],
          typeitems:this.types,
          days: [],
          dayitems: this.days, 
          plans: [],
          planitems: this.plans, 
        _itemName,
        _itemRoute,
        item: {plan_id: '', day_id: '',type:''}
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
                      console.log(jsonData.data[0]);
                      vm.plan_name= vm.item.plan.name  ;
                      vm.day_name= vm.item.day.name;
                      vm.type_name = vm.item.type;
                       vm.dayitems = vm.item.day;
                       vm.planitems = vm.item.plan;
                       vm.typeitems = [ "body","legs", "hands" ];
                    }); 
               fetch(days_api_url_link)
                  .then(function(response){
                      return response.json();
                  }).then(function(jsonData){
                      jsonData.data.forEach(element => {
                          vm.days.push({id: element.id, name: element.name}); 
                      });
                       vm.types = [ "body", "legs" , "hands"];
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
              var dayId = this.dayitems.id;
              var planId = this.planitems.id;
              var type = this.typeitems;
              console.log(this);
              var data = JSON.stringify(
                  {
                    day_id : dayId,
                    plan_id: planId,
                    type:   type
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
 