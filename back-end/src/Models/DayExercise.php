<?php

namespace App\Models;

//use App\Models\{Exercise, Day};

class DayExercise extends AbstractModel
{
	protected $fillable = [
      'exercise_id', 'day_id', 'number_of_rounds'
  	];


    public function exercise()
    {
        return $this->belongsTo(Exercise::class, 'exercise_id');
    }
    

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

     
}
