<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'special',
        'country_id',
        'city_id',
        'address', 'logo',
        'shopAr', 'shopEn','shopUr',
        'ownerAr','ownerEn','ownerUr',
        'employee_id',
    ];

    protected $location = '/images/';


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        if ($this->roles == 'admin')
        {
            return true;
        }
    }

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function city(){
        return $this->belongsTo('App\City');
    }
    public function country(){
        return $this->belongsTo('App\Country');
    }
     public function photos()
     {
        return $this->hasMany('App\maintance_photos');
     }

    public function branchs()
    {
        return $this->hasMany('App\main_branches');
    }

    public function specials()
    {
        return $this->hasMany('App\CenterSpecials');
    }

}
