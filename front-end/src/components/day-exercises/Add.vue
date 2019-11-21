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
          <label for="add-exercise">Exercises</label>
          <select v-model="exerciseitems" class="form-control">
            <option  v-for="exercise in filteredExercises"  v-bind:value="exercise" v-bind:key="exercise.id">{{exercise.name}}</option>
          </select>
        </div>
        <div class="form-group">
        <label for="add-number_of_rounds">Number of rounds</label>
        <input class="form-control" type="number" min="0" id="add-number_of_rounds" v-model="item.number_of_rounds" required/>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <router-link class="btn btn-default" v-bind:to="{path: $data._itemRoute}">Cancel</router-link>
      </form>
    </div>
  </div>
</template>

<script>
  // server url
  var api_url_link= "http://localhost/api/dayexercises/store";
  // client url
  var _itemName= "dayexercise";
  var _itemRoute= "/dayexercises";
  
  var days_api_url_link= "http://localhost/api/days";
  var exercises_api_url_link= "http://localhost/api/exercises";


  export default {
      name: 'Add',
      data: function () {
      return { 
          days: [],
          dayitems: this.days, 
          exercises: [],
          exerciseitems: this.exercises, 
          _itemName,
          _itemRoute, 
          item: {exercise_id: '', day_id: '',number_of_rounds:''}
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
        createItem: function(e) {
             e.preventDefault();
            var item = this.item;
            var dayId = this.dayitems.id;
            var exerciseId = this.exerciseitems.id;
            var data = JSON.stringify(
                { 
                 exercise_id: exerciseId,
                 day_id: dayId,
                 number_of_rounds: item.number_of_rounds,
                 });
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
        filteredExercises: function () {
                      return this.exercises
        }
    } 
  };
  </script>
