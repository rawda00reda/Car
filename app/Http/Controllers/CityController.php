<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:View_City', ['only' => ['index']]);
        $this->middleware('permission:Add_City', ['only' => ['create','store']]);
        $this->middleware('permission:Edit_City', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete_City', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.*/
    public function index(){
     $cities =City::all();

    return view('admin/city/index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities=City::all();
          $country=Country::all();
        return view('admin/city/create',compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'cityAr'=>'required',
            'cityEn'=>'required',
            'cityUr'=>'required',
            'country_id'=>'required'
        ]);
        $city=new City();
        $city->cityAr=request('cityAr');
        $city->cityEn=request('cityEn');
        $city->cityUr=request('cityUr');
        $city->country_id=request('country_id');
        $city->save();
        return redirect('admin/city')->with('success','تم اضافه البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city=City::find($id);
        $country=Country::all();
        return view('admin/city/edit',compact('city','country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city=City::find($id);
        $this->validate(request(),[
            'cityAr'=>'required',
            'cityEn'=>'required',
            'cityUr'=>'required',
            'country_id'=>'required'


        ]);
        $city->cityAr=request('cityAr');
        $city->cityEn=request('cityEn');
        $city->cityUr=request('cityUr');
        $city->country_id=request('country_id');
        $city->save();
        return redirect('admin/city')->with('success','تم تعديل البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city=City::find($id);
        $city->delete();
        return back()->with('success','تم حذف البيانات بنجاح');

    }
}
