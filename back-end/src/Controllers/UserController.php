<?php

namespace App\Controllers;

use App\Models\User;

class UserController  extends AbstractController
{
    function __construct()
    {
        $this->model_list = User::all();
        $this->object_name = new User ;

        $this->title = 'User' ;
        $this->titleList  = 'User List'; 

        $this->route_name = 'users' ;
        $this->path_directory = 'users/'; 
    }
}
