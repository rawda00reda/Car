<?php

namespace App\Providers;
use App\City;
use App\Contact;
use App\Country;
use App\Department;
use App\Faq;
use App\Product;
use App\Service;
use App\Shipment;
use App\Social;
use App\User;
use App\Welcome;
use Illuminate\Support\Facades\Auth;
use View;

use App\Slider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength('191');

        $sliders =Slider::inRandomOrder()->get();
        view::share('sliders',$sliders);

        $first=Slider::all()->first();
        view::share('first',$first);

        $welcomes =Welcome::orderBy('created_at', 'desc')->take(2)->get();
        view::share('welcomes',$welcomes);

        $welcome =Welcome::inRandomOrder()->take(1)->get();
        view::share('welcome',$welcome);

        $welcom =Welcome::orderBy('created_at', 'asc')->take(2)->get();
        view::share('welcom',$welcom);

        $services=Service::orderBy('created_at','desc')->get();
        view::share('services',$services);


//        $publishs=Product::inRandomOrder()->where('publish','on')->take(2)->get();
//        view::share('publishs',$publishs);

        $abouts=Faq::orderBy('created_at','desc')->get();
        view::share('abouts',$abouts);

        $socialss = Social::orderBy('created_at', 'desc')->get();
        view::share('socialss', $socialss);

        $contacts = Contact::orderBy('created_at', 'desc')->get();
        view::share('contacts', $contacts);

        $contacts = Contact::all();
        view::share('contacts', $contacts);


        $citys = City::orderBy('created_at', 'desc')->get();
        view::share('citys', $citys);

        $countries = Country::orderBy('created_at', 'desc')->get();
        view::share('countries', $countries);

        $Shippings = User::where('special','Shipping')->get();
        view::share('Shippings', $Shippings);

        $depts=Department::all();
        view::share('depts', $depts);


    }
}
