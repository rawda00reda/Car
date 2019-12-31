<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CenterSpecials extends Model
{
    protected $fillable = ['user_id','special_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function specials()
    {
        return $this->hasMany('App\Special');
    }
}
