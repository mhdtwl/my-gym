<template >
  <div>
      <div class="form-group">
        <label for="add-plan">Plans</label>
         <select v-model="planitems" class="form-control">
           <option  v-for="item in filteredPlans" v-bind:key="item.id">{{item.name}}</option>
         </select>
      </div>
  </div>
</template>

<script>

var plans_api_url_link= "http://localhost/api/plans";

export default {
  data () {
    return {
       plans: [],
       planitems: this.plans, 
    }
  }, mounted () {
        this.fetchData()
    },methods: {
      fetchData () {
        var vm = this
        fetch(plans_api_url_link)
            .then(function(response){
                return response.json();
            }).then(function(jsonData){
                jsonData.data.forEach(element => {
                    console.log({id: element.id, name: element.name});
                    vm.plans.push({id: element.id, name: element.name}); 
                });
            }); 
        }
    },
      computed: {
          filteredPlans: function () {
                       return this.plans
          }
        
    }
}
</script>
