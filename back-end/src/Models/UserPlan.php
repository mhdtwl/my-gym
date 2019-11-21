<?php

namespace App\Models;

 
class UserPlan extends AbstractModel
{
    protected $fillable = [
      'user_id', 'plan_id', 'number_of_weeks'
  	];


    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
