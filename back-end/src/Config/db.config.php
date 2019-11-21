<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
			'driver' => 'mysql',
    		'host' =>  '127.0.0.1',
    		'port' =>   '3306',
    		'database' =>   'mygym',
    		'username' =>   'root',
    		'password' =>  '',
    		'unix_socket' =>   '',
    		'charset' => 'utf8',
    		'collation' => 'utf8_general_ci',
    		'prefix' => '',
    		'strict' => true,
    		'engine' => null,

]);

//Make this Capsule instance available globally.
$capsule->setAsGlobal();

// Setup the Eloquent ORM.
$capsule->bootEloquent();
