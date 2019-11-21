
<script>
    import BaseList from '../base-template/List.vue';
    // server url
    var api_url_link= "http://localhost/api/exercises";
    // client url
    var _itemName= "exercise";
    var _itemRoute= "/exercises";
    var _itemCreate= _itemRoute+"/add";
    export default {
        extends: BaseList,
        data: function () {
            return {
                _itemName,
                _itemRoute,
                _itemCreate,  
                exercises: [],
                items: this.exercises, 
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
                            vm.exercises.push(element) 
                        });
                    }); 
                },
        },
        computed: {
            filteredItems: function () {
                        return this.exercises.filter(function (item) {
                    return this.searchKey=='' || item.name.indexOf(this.searchKey) !== -1;
                },this);
            }
        }
    };
</script>
