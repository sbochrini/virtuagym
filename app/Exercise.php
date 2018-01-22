<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
   protected $table="exercise";

    public function days()
    {
        return $this->belongsToMany('App\PlanDay');
    }
}
