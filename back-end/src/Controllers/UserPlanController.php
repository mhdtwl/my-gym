<?php

namespace App\Controllers;

use App\Models\UserPlan;

class UserPlanController  extends AbstractController
{
    function __construct()
    {
        $this->model_list = UserPlan::with('plan','user')->get();
        $this->object_name = new UserPlan ;

        $this->title = 'User Plan' ;
        $this->titleList  = 'User Plan List'; 

        $this->route_name = 'UserPlan' ;
        $this->path_directory = 'UserPlans/'; 
    }

    public function show( $id) 
  	{
	    try{
	      $body = app('request')->body ; 
	      $model = $this->object_name::where('id',$id)->with('plan','user')->get();//findOrFail($id);
	      return AbstractController::apiResponse($model,null,200); 
	     }catch(\Exception $e){
	      http_response_code(500);
	     return AbstractController::apiResponse([],$e->getMessage(),500);   
  	 }  
  	}


    ## todo
    /// on update  create  or delete 
    // $users =  $this->object->plan->users 
    // $emails = getAllUserEmails ( $users)
    // $this->sendEmail($users) 
    // 
}
