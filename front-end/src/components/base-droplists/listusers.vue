<template >
  <div>
      <div class="form-group">
        <label for="add-user">Users</label>
         <select v-model="useritems" class="form-control">
           <option  v-for="item in filteredUsers" v-bind:key="item.id">{{item.firstname}} {{item.lastname}}</option>
         </select>
      </div>
  </div>
</template>

<script>

var users_api_url_link= "http://localhost/api/users";

export default {
  data () {
    return {
       users: [],
       useritems: this.users, 
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
                    vm.users.push({id: element.id, firstname: element.firstname, lastname: element.lastname}); 
                });
            }); 
        }
    },
      computed: {
          filteredUsers: function () {
                       return this.users
          }
        
    }
}
</script>
