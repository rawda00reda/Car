<?php

use Illuminate\Http\Request;

Route::group([
    'middleware' => ['api','cors','lang']

],
    function ($router) {

        Route::get('/ip', function () {
            dd(request()->ip());
        });

        Route::post('login', 'AuthController@login');
        Route::post('signup', 'AuthController@signup');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
        Route::post('update', 'AuthController@update');


        Route::get('city', 'MobileController@city');
        Route::get('city/{id}', 'MobileController@cityById');
        Route::get('country', 'MobileController@country');
        Route::get('specials', 'MobileController@specials');






    }
);
