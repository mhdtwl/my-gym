<?php

namespace App\Models;

 

class PlanDay extends AbstractModel
{
    protected $fillable = [
      'plan_id', 'day_id', 'type'
  	];

  	protected $types = ['body','legs','hands'];


    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
    

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

}
