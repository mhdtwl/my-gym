<?php
/// It's an Abstraction for the controllers 
/// Use this class when you want to create a normal
/// Add , Edit , Delete Control Clase 

namespace App\Controllers;

abstract class AbstractController  
{
    # model
  protected $model_list  ; 
  protected $object_name  ;


  public function index()  
  {
    return AbstractController::apiResponse($this->model_list);    
  }
  
  public function store()  
  {   
    try{
        $body = app('request')->body ; 
        $this->object_name->create($body);
        http_response_code(201);
        return AbstractController::apiResponse($body,null,201);  
      }catch(\Exception $e){
        http_response_code(500);
     return AbstractController::apiResponse([],$e->getMessage(),500);  
    }
  }
  public function show( $id) 
  {
    try{
      $body = app('request')->body ; 
      $model = $this->object_name::findOrFail($id);
      return AbstractController::apiResponse($model,null,200); 
     }catch(\Exception $e){
      http_response_code(500);
     return AbstractController::apiResponse([],$e->getMessage(),500);   
   }  
  } 
  public function update( $id) 
  {
    try{
      $body = app('request')->body ; 
      $model = $this->object_name::findOrFail($id);
      $model->update($body);
      return AbstractController::apiResponse([],null,200); 
     }catch(\Exception $e){
      http_response_code(500);
     return AbstractController::apiResponse([],$e->getMessage(),500);   
   }  
  }

  public function destroy($id)
  {
    try{
      $this->object_name->destroy($id);
      return AbstractController::apiResponse([],null,200);   
    }catch(\Exception $e){
      http_response_code(500);
     return AbstractController::apiResponse([],$e->getMessage(),500);   
   }
 }


public function sendEmail($body, $toArray){

  $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525))
  ->setUsername('174132361a924b')
  ->setPassword('80cf6faeea8e94');
 

  // Create the Mailer using your created Transport
  $mailer = new Swift_Mailer($transport);

  // Create a message
  $message = (new Swift_Message('Wonderful Subject'))
    ->setFrom(['john111@google.com' => 'John Doe'])
    ->setTo(['receiver111@google.org', 'other@domain.org' => 'A name'])
    ->setBody('Here is the message itself')
    ;

  // Send the message
  $result = $mailer->send($message);

}

/**
 * API HELPERS
 */
private static function successCode(){
  return [200, 201, 202]; 
}

public static function apiResponse($data = null  , $errorMsg  = null , $code = 200 ){
  $array = [
    "data" => $data ,
    "error" => $errorMsg ,  
    "code" => $code,
    "status" => in_array(  $code , AbstractController::successCode() )   ? true : false
  ];
  print_r( json_encode($array)) ;
   //print_r( json_encode($array)) ;
}
}

