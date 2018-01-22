<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanDay extends Model
{
    protected $table = 'plan_days';
    public $timestamps = false;

    public function plan(){
        return $this->belongsTo('App\Plan');
    }

    public function exercises(){
        return $this->belongsToMany('App\Exercise', 'exercise_instances', 'day_id', 'exercise_id');;
    }

    public function exerciseInstances(){
        return $this->hasMany('App\ExerciseInstance', 'day_id', 'id');
    }
}
