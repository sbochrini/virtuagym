<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanDay extends Model
{
    protected $table = 'plan_days';

    public function plan(){
        return $this->belongsTo('App\Plan');
    }
}
