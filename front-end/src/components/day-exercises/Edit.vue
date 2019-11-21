
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
              <label for="add-exercise">Exercises -    {{$data.exercise_name}}  </label>
              <!-- {{item.exercise.name}} -->
              <select v-model="exerciseitems" class="form-control">
                <option  v-for="exercise in filteredExercises"  v-bind:value="exercise" v-bind:key="exercise.id">{{exercise.name}}</option>
              </select>
            </div>
            <div class="form-group">
            <label for="add-number_of_rounds">Number of rounds</label>
            <input class="form-control" type="number" min="0" id="add-number_of_rounds" v-model="item.number_of_rounds" required/>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <router-link class="btn btn-default" v-bind:to="{path: $data._itemRoute}">Cancel</router-link>
        </form>
        </div>
    </div>
</template>

<script>
  // server url
  var get_api_url_link= "http://localhost/api/dayexercises/show/";
  var update_api_url_link= "http://localhost/api/dayexercises/update/";
  // client url
  var _itemName= "dayexercise";
  var _itemRoute= "/dayexercises";
  
  var days_api_url_link= "http://localhost/api/days";
  var exercises_api_url_link= "http://localhost/api/exercises";

  export default {
      name: 'Edit',
      data: function () {
      return {  
          // dayDefaultSelected:[],
          day_name:"",
          exercise_name:"",
          days: [],
          dayitems: this.days, 
          exercises: [],
          exerciseitems: this.exercises, 
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
                      vm.exercise_name= vm.item.exercise.name  ;
                      vm.day_name= vm.item.day.name;
                       vm.dayitems = vm.item.day;
                       vm.exerciseitems = vm.item.exercise;
                    }); 
               fetch(days_api_url_link)
                  .then(function(response){
                      return response.json();
                  }).then(function(jsonData){
                      jsonData.data.forEach(element => {
                          vm.days.push({id: element.id, name: element.name}); 
                      });
                  }); 
              fetch(exercises_api_url_link)
                .then(function(response){
                    return response.json();
                }).then(function(jsonData){
                    jsonData.data.forEach(element => {
                        vm.exercises.push({id: element.id, name: element.name}); 
                    });
                }); 
            },
            updateItem(e) {
              e.preventDefault();
              var item = this.item;
              var dayId = this.dayitems.id;
              var exerciseId = this.exerciseitems.id;
              var data = JSON.stringify(
                  {
                    day_id : dayId,
                    exercise_id: exerciseId,
                    number_of_rounds: item.number_of_rounds//,
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
        filteredExercises: function () {
                      return this.exercises
        }
    } 
  };
  </script>
 