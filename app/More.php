<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class More extends Model
{
    protected $fillable = ['stock', 'colorAr','colorEn','img'];

    public function product()
    {
        return $this->belongsTo(AddProduct::class);
    }

}
