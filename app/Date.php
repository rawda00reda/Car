<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    public function mode(){
        return $this->belongsTo('App\CarMode');
    }

    public function cc(){
        return $this->hasMany('App\Cc');
    }
}
