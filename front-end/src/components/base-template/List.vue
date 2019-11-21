<template  >
     <div class="card">
        <div class="card-body">
             <div class="row  col-12 ">
                <div class="filters  col-6">
                    <div class="form-group col-sm-3">
                    <input v-model="searchKey" placeholder="Search by name"
                            class="form-control" id="search-element" requred/>
                    </div>
                </div>
                 <div class="actions col-6 text-center">
                    <router-link class="btn btn-primary" v-bind:to="{path: $data._itemCreate}">
                    Add {{$data._itemName}}
                    </router-link>
                </div>
            </div>
        <table class="table table-striped table-responsive-sm text-center">
        <thead>
        <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="item in filteredItems" v-bind:key="item.id">
        <td>
            <!-- <router-link v-bind:to="{name: 'item', params: {item_id: item.id}}">{{ item.name }}</router-link> -->
            {{ item.name }}
        </td>
        <td>{{ item.description }}</td>
        <td>
            <router-link class="btn btn-warning btn-xs" v-bind:to="{path: $data._itemRoute+'/'+ item.id+'/edit'}">Edit</router-link>
            <router-link class="btn btn-danger btn-xs" v-bind:to="{path: $data._itemRoute+'/'+ item.id+'/delete'}">Delete</router-link>
        </td>
        </tr>
        </tbody>
        </table>  
        </div>
    </div>
</template>
