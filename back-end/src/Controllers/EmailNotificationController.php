<?php

namespace App\Http\Controllers;
 
use App\Models\EmailNotification;

class EmailNotificationController extends AbstractController
{
     function __construct()
    {
        $this->model_list = EmailNotification::all();
        $this->object_name = new EmailNotification ;

        $this->title = 'Email Notification' ;
        $this->titleList  = 'Email Notification List'; 

        $this->route_name = 'emailNotifications' ;
        $this->path_directory = 'emailNotifications/'; 
    }
}

