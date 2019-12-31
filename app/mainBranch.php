<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mainBranch extends Model
{
    protected $fillable = [
        'streetAr', 'streetEn', 'streetUr', 'technicianAr',
        'technicianEn', 'technicianUr', 'phone', 'lat',
        'long', 'user_id', 'country_id','city_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function country(){
        return $this->belongsTo('App\Country');
    }

    public function city(){
        return $this->belongsTo('App\City');
    }
}
