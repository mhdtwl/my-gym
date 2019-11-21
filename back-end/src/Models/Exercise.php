<?php

namespace App\Models;


class Exercise extends AbstractModel
{
     public function days()
    {
        return $this->hasMany(DayExercise::class);
    }
}
