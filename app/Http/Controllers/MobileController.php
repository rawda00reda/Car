<?php

namespace App\Http\Controllers;
use App\City;
use App\Country;
use App\Http\Resources\CountryResource;
use App\Special;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MobileController extends Controller
{



    public function city()
    {
        $citys = CountryResource::collection(City::get());
        return response()->json(['citys'=>$citys], 200);
    }

    public function country()
    {
        $countrys = CountryResource::collection(Country::get());
        return response()->json(['countrys'=>$countrys], 200);
    }

    public function specials()
    {
        $specials = CountryResource::collection(Special::get());
        return response()->json(['specials'=>$specials], 200);
    }











}
