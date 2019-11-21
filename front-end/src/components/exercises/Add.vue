
<script>
 import BaseAdd from '../base-template/Add.vue';
  // server url
  var api_url_link= "http://localhost/api/exercises/store";
  // client url
  var _itemName= "exercise";
  var _itemRoute= "/exercises";
  
  export default {
      name: 'Add',
      extends: BaseAdd,
      data: function () {
      return { _itemName,item: {name: '', description: ''},  _itemRoute }
      },
      methods: {
        createItem: function(e) {
             e.preventDefault();
            var item = this.item;
            var data = JSON.stringify(
                {name: item.name,
                 description: item.description});

            $.post(api_url_link,   
                data, 
                function(data,status) { 
                   console.log([data,status]);
                    window.location.href = _itemRoute;
                },'application/json'); 
        }
      }
  };
  </script>
