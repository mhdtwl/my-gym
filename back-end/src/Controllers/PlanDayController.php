<?php

namespace App\Controllers;

use App\Models\PlanDay;

class PlanDayController extends AbstractController
{
     function __construct()
    {
        $this->model_list = PlanDay::with('plan','day')->get();
        $this->object_name = new PlanDay ;

        $this->title = 'Routine' ;
        $this->titleList  = 'Routine List'; 

        $this->route_name = 'planDay' ;
        $this->path_directory = 'planDay/'; 
    }

    public function show( $id) 
  	{
	    try{
	      $body = app('request')->body ; 
	      $model = $this->object_name::where('id',$id)->with('plan','day')->get();//findOrFail($id);
	      return AbstractController::apiResponse($model,null,200); 
	     }catch(\Exception $e){
	      http_response_code(500);
	     return AbstractController::apiResponse([],$e->getMessage(),500);   
  	 }  
  	}

    ## todo
    /// on update  create  or delete 
    // $users =  $this->object->plan->users 
    // getAllUser Emails ( $users)
    // $this->sendEmail($users) 

}

