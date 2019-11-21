<?php

namespace App\Controllers;

use App\Models\Plan;

class PlanController extends AbstractController
{
     function __construct()
    {
        $this->model_list = Plan::all();
        $this->object_name = new Plan ;

        $this->title = 'Plan' ;
        $this->titleList  = 'Plan List'; 

        $this->route_name = 'plan' ;
        $this->path_directory = 'plan/'; 
    }
}

