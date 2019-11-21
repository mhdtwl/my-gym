<?php

namespace App\Controllers;

use App\Models\Exercise;

class ExerciseController extends AbstractController
{
     function __construct()
    {
        $this->model_list = Exercise::all();
        $this->object_name = new Exercise ;

        $this->title = 'Exercise' ;
        $this->titleList  = 'Exercise List'; 

        $this->route_name = 'exercises' ;
        $this->path_directory = 'exercises/'; 
    }
}

