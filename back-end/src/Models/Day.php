<?php

namespace App\Models;


class Day extends AbstractModel
{
    public function exercices()
    {
        return $this->hasMany(DayExercise::class);
    }
}
