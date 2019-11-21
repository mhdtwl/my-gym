<?php

namespace App\Models;

class User extends AbstractModel
{
   
    protected $fillable = [
        'firstname', 'lastname','age', 'email' 
    ];

}
