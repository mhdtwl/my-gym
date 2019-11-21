<?php

namespace App\Controllers;

use App\Models\DayExercise;
use App\Models\Day;
use App\Models\Exercise;

class DayExerciseController extends AbstractController
{
     function __construct()
    {
        $this->model_list = DayExercise::with('exercise','day')->get(); //
        $this->object_name = new DayExercise ;

        $this->title = 'Day Exercise' ;
        $this->titleList  = 'Day Exercise List'; 

        $this->route_name = 'dayExercises' ;
        $this->path_directory = 'dayExercises/'; 
    }

   public function show( $id) 
  {
    try{
      $body = app('request')->body ; 
      $model = $this->object_name::where('id',$id)->with('exercise','day')->get();//findOrFail($id);
      return AbstractController::apiResponse($model,null,200); 
     }catch(\Exception $e){
      http_response_code(500);
     return AbstractController::apiResponse([],$e->getMessage(),500);   
   }  
  } 
}

