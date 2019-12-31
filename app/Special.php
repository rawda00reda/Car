<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Special extends Model
{
    public function center(){
        return $this->belongsTo('App\CenterSpecials');
    }
}
