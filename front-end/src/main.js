import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './App.vue';

import Home from './components/Home.vue';

import ListDay from './components/days/List.vue'
import AddDay from './components/days/Add.vue'
import EditDay from './components/days/Edit.vue'
import DeleteDay from './components/days/Delete.vue'

import ListPlan from './components/plans/List.vue'
import AddPlan from './components/plans/Add.vue'
import EditPlan from './components/plans/Edit.vue'
import DeletePlan from './components/plans/Delete.vue'

import ListExercise from './components/exercises/List.vue'
import AddExercise from './components/exercises/Add.vue'
import EditExercise from './components/exercises/Edit.vue'
import DeleteExercise from './components/exercises/Delete.vue'


import ListUser from './components/users/List.vue'
import AddUser from './components/users/Add.vue'
import EditUser from './components/users/Edit.vue'
import DeleteUser from './components/users/Delete.vue'

import ListDayExercises from './components/day-exercises/List.vue'
import AddDayExercises from './components/day-exercises/Add.vue'
import EditDayExercises from './components/day-exercises/Edit.vue'
import DeleteDayExercises from './components/day-exercises/Delete.vue'

import ListPlanDays from './components/plan-days/List.vue'
import AddPlanDays from './components/plan-days/Add.vue'
import EditPlanDays from './components/plan-days/Edit.vue'
import DeletePlanDays from './components/plan-days/Delete.vue'
 
import ListUserPlans from './components/user-plans/List.vue'
import AddUserPlans from './components/user-plans/Add.vue'
import EditUserPlans from './components/user-plans/Edit.vue'
import DeleteUserPlans from './components/user-plans/Delete.vue'

Vue.use(VueRouter);

const routes = [
    {path: '/days', component: ListDay},
    {path: '/days/Add', component: AddDay},
    {path: '/days/:item_id/Edit', component: EditDay},
    {path: '/days/:item_id/Delete', component: DeleteDay},

    {path: '/plans', component: ListPlan},
    {path: '/plans/Add', component: AddPlan},
    {path: '/plans/:item_id/Edit', component: EditPlan},
    {path: '/plans/:item_id/Delete', component: DeletePlan},

    {path: '/exercises', component: ListExercise},
    {path: '/exercises/Add', component: AddExercise},
    {path: '/exercises/:item_id/Edit', component: EditExercise},
    {path: '/exercises/:item_id/Delete', component: DeleteExercise},

    {path: '/users', component: ListUser},
    {path: '/users/Add', component: AddUser},
    {path: '/users/:item_id/Edit', component: EditUser},
    {path: '/users/:item_id/Delete', component: DeleteUser},
    
    {path: '/dayexercises', component: ListDayExercises},
    {path: '/dayexercises/Add', component: AddDayExercises},
    {path: '/dayexercises/:item_id/Edit', component: EditDayExercises},
    {path: '/dayexercises/:item_id/Delete', component: DeleteDayExercises},

    {path: '/plandays', component: ListPlanDays},
    {path: '/plandays/Add', component: AddPlanDays},
    {path: '/plandays/:item_id/Edit', component: EditPlanDays},
    {path: '/plandays/:item_id/Delete', component: DeletePlanDays},

    {path: '/userplans', component: ListUserPlans}, 
    {path: '/userplans/Add', component: AddUserPlans},
    {path: '/userplans/:item_id/Edit', component: EditUserPlans},
    {path: '/userplans/:item_id/Delete', component: DeleteUserPlans},
    
    {path: '/', component: Home}
];

const router = new VueRouter({
    routes, 
    mode: 'history'
});

new Vue({
    el: '#app',
    router, 
    render: h => h(App)
});
