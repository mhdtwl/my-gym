
<script>
 import BaseEdit from '../base-template/Edit.vue';
  // server url
  var get_api_url_link= "http://localhost/api/plans/show/";
  var update_api_url_link= "http://localhost/api/plans/update/";
  // client url
  var _itemName= "plan";
  var _itemRoute= "/plans";
  

  export default {
      name: 'Edit',
      extends: BaseEdit,
      data: function () {
      return {  
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
                      vm.item = jsonData.data;
                    }); 
            },
            updateItem(e) {
              e.preventDefault();
              var item = this.item;
              var data = JSON.stringify(
                  {name: item.name,
                  description: item.description});

              $.patch(update_api_url_link + this.$route.params.item_id,   
                data, 
                function(data,status) { 
                   console.log([data,status]);
                  //  window.history.back();
                  window.location.href = _itemRoute;
                },'application/json'); 
        }
      }
  };
  </script>
 