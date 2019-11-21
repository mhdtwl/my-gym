<template>
  <div id="app" class="container">
    <ul class="nav justify-content-center  navbar-light bg-light ">
        <li class="nav-item">
          <router-link class="nav-link alert-link" to="/">Home</router-link>
          </li>
        <li class="nav-item dropdown">
          <a class="nav-link alert-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> Gym Management </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="/userplans"> User Plans</a>
            <a class="dropdown-item" href="/dayexercises">Day Exercises</a>
            <a class="dropdown-item" href="/plandays">Plan Days</a>
          </div>    
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link alert-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> Gym Resource </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="/plans">Plans</a>
            <a class="dropdown-item" href="/days">Days</a>
            <a class="dropdown-item" href="/exercises">Exercises</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/users">Users</a>
          </div>
        </li>
      </ul>
    <router-view></router-view>
  </div>
</template>

<script>


export default {
  data () {
    return {
    }
  }
}
</script>

<style>

</style>
