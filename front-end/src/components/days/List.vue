
<script>
    import BaseList from '../base-template/List.vue';
    // server url
    var api_url_link= "http://localhost/api/days";
    // client url
    var _itemName= "day";
    var _itemRoute= "/days";
    var _itemCreate= _itemRoute+"/add";
    export default {
        extends: BaseList,
        data: function () {
            return {
                _itemName,
                _itemRoute,
                _itemCreate,  
                days: [],
                items: this.days, 
                searchKey: ''
                };
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
                fetch(api_url_link)
                    .then(function(response){
                        return response.json();
                    }).then(function(jsonData){
                        jsonData.data.forEach(element => {
                            vm.days.push(element) 
                        });
                    }); 
                },
        },
        computed: {
            filteredItems: function () {
                        return this.days.filter(function (item) {
                    return this.searchKey=='' || item.name.indexOf(this.searchKey) !== -1;
                },this);
            }
        }
    };
</script>
