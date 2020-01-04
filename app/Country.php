<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable=['id','countryAr','countryEn','countryUr'];

    public  function users(){
        return $this->hasMany('App\User');
    }
    public  function branch(){
        return $this->hasMany('App\mainBranch');
    }
    public  function cities(){
        return $this->hasMany('App\City');
    }


}
