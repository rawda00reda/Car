<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintancePhoto extends Model
{
    protected $fillable = ['user_id','img'];

    public function centers(){
        return $this->belongsTo('App\MaintenanceCenter');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
