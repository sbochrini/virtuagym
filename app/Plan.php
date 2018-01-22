<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plan';
    public $timestamps = false;

    public function days(){
        return $this->hasMany('App\PlanDay');
    }

    public function difficulty(){
        return $this->hasOne('App\DifficultyLevel', 'id', 'plan_difficulty');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
