<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plan';

    public function days(){
        return $this->hasMany('App\PlanDay');
    }
}
