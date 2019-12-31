<?php

use App\Shipment;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','web', ]

    ],
    function()
    {

        Route::get('/', function () {
            return view('welcome');
        });
        Auth::routes();
        Route::get('/home', 'HomeController@index')->name('home');
        Route::resource('admin/roles','RoleController')->middleware('auth');
        Route::resource('admin/users','UserController')->middleware('auth');
        Route::resource('admin/depts','DepartmentControl')->middleware('auth');
        Route::resource('admin/addcar','AddCarController')->middleware('auth');
        Route::resource('admin/center','MaintenanceCenterController')->middleware('auth');

        Route::resource('admin/branch','BranchController')->middleware('auth');
        Route::resource('admin/special','SpecialController')->middleware('auth');
        Route::resource('admin/country', 'CountryController')->middleware('auth');
        Route::resource('admin/city', 'CityController')->middleware('auth');
        Route::resource('admin/carmodel', 'CarModelController')->middleware('auth');
        Route::resource('admin/brand', 'BrandController')->middleware('auth');
        Route::resource('admin/date', 'DateController')->middleware('auth');
        Route::resource('admin/addcar', 'AddCarController')->middleware('auth');
        Route::resource('admin/cc', 'CcController')->middleware('auth');


        Route::resource('admin/addproduct', 'AddProducts')->middleware('auth');
        Route::resource('admin/shipments', 'ShipController')->middleware('auth');
        Route::get('admin/transferorders', 'ShipController@transferorders')->middleware('auth');
        Route::get('admin/shiporder', 'ShipController@shiporder')->middleware('auth');
        Route::post('admin/ship/{id}', 'ShipController@ship')->middleware('auth');
        Route::get('admin/shiporder/{id}', 'ShipController@acceptorders')->middleware('auth');
        Route::post('admin/shiporder/{id}', 'ShipController@acceptorders')->middleware('auth');
        Route::get('admin/deleteorders', 'ShipController@deleteorderss')->middleware('auth');
        Route::get('admin/acceptorders', 'ShipController@acceptorderss')->middleware('auth');
        Route::get('admin/reject', 'ShipController@reject')->middleware('auth');
        Route::get('admin/accept', 'ShipController@accept')->middleware('auth');
        Route::get('admin/deleteorders/{id}', 'ShipController@deleteorders')->middleware('auth');
        Route::post('admin/deleteorders/{id}', 'ShipController@deleteorders')->middleware('auth');
        Route::resource('admin/more/{id}/find','MorelController')->middleware('auth');
        Route::resource('admin/slider','SliderController')->middleware('auth');
        Route::resource('admin/messages','MessageController')->middleware('auth');
        Route::resource('admin/socials','SocialController')->middleware('auth');
        Route::resource('admin/services','ServiceController')->middleware('auth');
        Route::resource('admin/welcome','WelcomeController')->middleware('auth');
        Route::resource('admin/faq','FaqController')->middleware('auth');
        Route::resource('admin/contact','ContactController')->middleware('auth');
        Route::resource('admin/supplier','Suppliers')->middleware('auth');
        Route::resource('admin/shippingorders','shippingController')->middleware('auth');
        Route::get('/admin/userdate/{id}', 'AddProducts@userdate')->middleware('auth');
        Route::get('/admin/productdata/{id}', 'AddProducts@productdata')->middleware('auth');
        Route::get('/admin/orderdetails/{id}', 'AddProducts@orderdetails')->middleware('auth');
        Route::get('product/{id}', 'AddProducts@find');
        Route::get('/cart', 'CartControl@index');
        Route::post('/cart', 'CartControl@store');
        Route::delete('/cart/{id}', 'CartControl@destroy');
        Route::resource('check','CheckoutController')->middleware('auth');
        Route::get('/admin/Suppliers', function () {
            return view('suppliers');
        });
        Route::get('/admin/shipping ', function () {
            return view('shipping');
        });
        Route::get('/Account', function () {return view('Account');})->middleware('auth');
        Route::get('/Mypurch', function () {
            $Mypurchs=Shipment::where('user_id',Auth::user()->id)->get();
            return view('Mypurch',compact('Mypurchs'));
        })->middleware('auth');
        Route::post('/Account/{id}', 'UserController@find')->middleware('auth');

        Route::get('/aboutus ', function () {
            return view('aboutus');
        });
        Route::get('/Contact ', function () {
        return view('Contact');
    });

        Route::post('/Contact','MessageController@store');





    });
