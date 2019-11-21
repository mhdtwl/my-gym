<template>
    <div class="card">
        <div class="card-body">
            <h2>Delete  {{$data._itemName}} {{ $data.item.name }}</h2>
            <form v-on:submit="deleteItem" class="">
                <p>The action cannot be undone.</p>
                <button type="submit" class="btn btn-danger">Delete</button>
                <router-link class="btn btn-default" v-bind:to="{path: $data._itemRoute}">Cancel</router-link>
            </form>
        </div>
    </div>
</template>