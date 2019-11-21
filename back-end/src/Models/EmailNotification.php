<?php

namespace App\Models;


class EmailNotification extends AbstractModel
{
    protected $fillable = [
      'user_id', 'plan_id', 'type', 'description'
  	];

  	protected $types = ['assign-to','change-plan'];

  	public function plans()
    {
        return $this->belongsToMany('App\Plan');
    }

    public function days()
    {
        return $this->belongsToMany('App\Day');
    }
}
