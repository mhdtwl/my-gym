<template>
     <div class="card">
        <div class="card-body">
        <h2>Edit  {{$data._itemName}}</h2>
        <form v-on:submit="updateItem">
            <div class="form-group">
            <label for="edit-name">Name</label>
            <input class="form-control" id="edit-name" v-model="item.name" required/>
            </div>
            <div class="form-group">
            <label for="edit-description">Description</label>
            <input type="hidden" v-model="item.created_at">
            <input type="hidden" v-model="item.updated_at">
            <textarea class="form-control" id="edit-description" rows="3" v-model="item.description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <router-link class="btn btn-default" v-bind:to="{path: $data._itemRoute}">Cancel</router-link>
        </form>
        </div>
    </div>
</template>
