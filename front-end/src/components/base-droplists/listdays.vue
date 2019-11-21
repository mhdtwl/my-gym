<template >
  <div>
      <div class="form-group">
        <label for="add-day">Days</label>
         <select v-model="dayitems" class="form-control">
           <option  v-for="item in filteredDays" v-bind:key="item.id">{{item.name}}</option>
         </select>
      </div>
  </div>
</template>

<script>

var days_api_url_link= "http://localhost/api/days";

export default {
  data () {
    return {
       days: [],
       dayitems: this.days, 
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
                    console.log({id: element.id, name: element.name});
                    vm.days.push({id: element.id, name: element.name}); 
                });
            }); 
        }
    },
      computed: {
          filteredDays: function () {
                       return this.days
          }
        
    }
}
</script>
