<?php
  
use  App\Controllers\{AbstractController,
					  DayController,
					  PlanController,
					  ExerciseController,
					  UserController,
					  DayExerciseController,
					  PlanDayController,
					  UserPlanController
					};

## middleware to ensure securety data
$route->before('/api', function (){

	$requestBody = app('request')->body ; 
	$securedBody=[];
	foreach ($requestBody as $key => $value) {
		$securedBody[$key] =  htmlspecialchars(strip_tags(($value)));
	}
    app('request')->body  =  $securedBody;
});

  
## Route Groups
$route->group('/api', function()
{
	$routeObject = $this;
	$this->group('/days', function()
	{
		$controller = new DayController();
		$this->get(['/', 'index', 'list'], [$controller,'index'] ); 
		$this->get('/show/{id}', [$controller,'show'] ); 
		$this->post('/store', [$controller,'store'] ); 
		$this->patch('/update/{id}', [$controller,'update'] ); 
		$this->delete('/delete/{id}', [$controller,'destroy'] ); 
	});

	$this->group('/plans', function()
	{
		$controller = new PlanController();
		$this->get(['/', 'index', 'list'], [$controller,'index'] ); 
		$this->get('/show/{id}', [$controller,'show'] ); 
		$this->post('/store', [$controller,'store'] ); 
		$this->patch('/update/{id}', [$controller,'update'] ); 
		$this->delete('/delete/{id}', [$controller,'destroy'] ); 
	});

	$this->group('/exercises', function()
	{
		$controller = new ExerciseController();
		$this->get(['/', 'index', 'list'], [$controller,'index'] ); 
		$this->get('/show/{id}', [$controller,'show'] ); 
		$this->post('/store', [$controller,'store'] ); 
		$this->patch('/update/{id}', [$controller,'update'] ); 
		$this->delete('/delete/{id}', [$controller,'destroy'] ); 
	});

	$this->group('/users', function()
	{
		$controller = new UserController();
		$this->get(['/', 'index', 'list'], [$controller,'index'] ); 
		$this->get('/show/{id}', [$controller,'show'] ); 
		$this->post('/store', [$controller,'store'] ); 
		$this->patch('/update/{id}', [$controller,'update'] ); 
		$this->delete('/delete/{id}', [$controller,'destroy'] ); 
	});
	###################
	## Relationships ##
	###################
	$this->group('/dayexercises', function()
	{
		$controller = new DayExerciseController();
		$this->get(['/', 'index', 'list'], [$controller,'index'] ); 
		$this->get('/show/{id}', [$controller,'show'] ); 
		$this->post('/store', [$controller,'store'] ); 
		$this->patch('/update/{id}', [$controller,'update'] ); 
		$this->delete('/delete/{id}', [$controller,'destroy'] ); 
	});
	$this->group('/plandays', function()
	{
		$controller = new PlanDayController(); 
		$this->get(['/', 'index', 'list'], [$controller,'index'] ); 
		$this->get('/show/{id}', [$controller,'show'] ); 
		$this->post('/store', [$controller,'store'] ); 
		$this->patch('/update/{id}', [$controller,'update'] ); 
		$this->delete('/delete/{id}', [$controller,'destroy'] ); 
	});
	$this->group('/userplans', function()
	{
		$controller = new UserPlanController();
		$this->get(['/', 'index', 'list'], [$controller,'index'] ); 
		$this->get('/show/{id}', [$controller,'show'] ); 
		$this->post('/store', [$controller,'store'] ); 
		$this->patch('/update/{id}', [$controller,'update'] ); 
		$this->delete('/delete/{id}', [$controller,'destroy'] ); 
	});
	/// it depends if it's needed to check the notification or just running by a cron-job
	// $this->group('/emailNotification', function()
	// {
	// 	$controller = new EmailNotificationController();
	// 	$this->get(['/', 'index', 'list'], [$controller,'index'] ); 
	// 	$this->post('/store', [$controller,'store'] ); 
	// 	$this->patch('/update/{id}', [$controller,'update'] ); 
	// 	$this->delete('/delete/{id}', [$controller,'destroy'] ); 
	// });
 	$this->any('/*', function() {
		return AbstractController::apiResponse([],"route not found",404);   
	});
});
$route->end();