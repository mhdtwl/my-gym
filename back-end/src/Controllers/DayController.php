<?php

namespace App\Controllers;

use App\Models\Day;

class DayController  extends AbstractController
{
    function __construct()
    {
        $this->model_list = Day::all();
        $this->object_name = new Day ;

        $this->title = 'Day' ;
        $this->titleList  = 'Day List'; 

        $this->route_name = 'days' ;
        $this->path_directory = 'days/'; 
    }
}
