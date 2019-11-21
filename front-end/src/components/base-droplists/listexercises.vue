<template >
  <div>
      <div class="form-group">
        <label for="add-exercise">Exercises</label>
         <select v-model="exerciseitems" class="form-control">
           <option  v-for="item in filteredExercises" v-bind:key="item.id">{{item.name}}</option>
         </select>
      </div>
  </div>
</template>

<script>

var exercises_api_url_link= "http://localhost/api/exercises";

export default {
  data () {
    return {
       exercises: [],
       exerciseitems: this.exercises, 
    }
  }, mounted () {
        this.fetchData()
    },methods: {
      fetchData () {
        var vm = this
        fetch(exercises_api_url_link)
            .then(function(response){
                return response.json();
            }).then(function(jsonData){
                jsonData.data.forEach(element => {
                    console.log({id: element.id, name: element.name});
                    vm.exercises.push({id: element.id, name: element.name}); 
                });
            }); 
        }
    },
      computed: {
          filteredExercises: function () {
                       return this.exercises
          }
        
    }
}
</script>
