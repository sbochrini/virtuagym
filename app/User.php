<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    public function plans(){
        return $this->hasMany('App\Plan');
    }
}
