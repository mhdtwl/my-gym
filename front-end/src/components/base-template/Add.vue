
<template >
  <div class="card">
      <div class="card-body">
      <h2>Add new  {{$data._itemName}}</h2>
      <form v-on:submit="createItem">
        <div class="form-group">
          <label for="add-name">Name</label>
          <input class="form-control" id="add-name" v-model="item.name" required/>
        </div>
        <div class="form-group">
          <label for="add-description">Description</label>
          <textarea class="form-control" id="add-description" rows="10" v-model="item.description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <router-link class="btn btn-default" v-bind:to="{path: $data._itemRoute}">Cancel</router-link>
      </form>
    </div>
   </div>
</template>

