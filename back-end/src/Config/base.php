<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Methods", "POST, GET, PATCH, PUT, OPTIONS, DELETE");
header("Access-Control-Allow-Headers", "Content-Type, Accept, X-Requested-With, remember-me, Access-Control-Allow-Methods, origin, Authorization, X-Requested-With, PATCH
AccountKey,x-requested-with,  authorization, accept, client-security-token, host, date, cookie, cookie2
");

header("Access-Control-Allow-Headers: *"); 
header("Access-Control-Request-Method: POST");
header("Access-Control-Request-Headers: *");
header("Access-Control-Request-Origin: *");
header("Content-Type: application/json");


define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', __DIR__ . DS);
//Show errors
//===================================
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//===================================

//require_once die(__DIR__ . " | " . BASE_PATH);


require_once __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../Config/db.config.php';

require_once __DIR__ . '/../Config/mail.config.php';


$app            = System\App::instance();
$app->request   = System\Request::instance();
$app->route     = System\Route::instance($app->request);

$route          = $app->route;

require_once __DIR__ . '/../Routing/routes.php';