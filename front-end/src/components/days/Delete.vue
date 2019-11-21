
<script>
 import BaseDelete from '../base-template/Delete.vue';
  // server url
var get_api_url_link= "http://localhost/api/days/show/";
var delete_api_url_link= "http://localhost/api/days/delete/";
  // client url
  var _itemName= "day";
  var _itemRoute= "/days";


export default {
    name: 'Delete',
    extends: BaseDelete,
    data: function () {
    return { _itemName,
            _itemRoute,
            item:[]
        }
    },
    mounted () {
        this.fetchData()
    },
    watch: {
        '$route': 'fetchData'
    },methods: {
      
      fetchData () {
                var vm = this
                fetch(get_api_url_link + this.$route.params.item_id)
                    .then(function(response){
                        return response.json();
                    }).then(function(jsonData){
                      vm.item = jsonData.data;
                    }); 
            },
      deleteItem: function(e) {
        e.preventDefault();
         $.delete(delete_api_url_link + this.$route.params.item_id,   
                [], 
                function(data,status) { 
                   console.log([data,status]);
                   window.location.href = _itemRoute;
                },'application/json'); 
        }
    }
};
</script>