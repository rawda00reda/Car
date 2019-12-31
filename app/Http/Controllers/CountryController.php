<?php

namespace App\Http\Controllers;

use App\Country;
use App\Productname;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:View_Country', ['only' => ['index']]);
        $this->middleware('permission:Add_Country', ['only' => ['create','store']]);
        $this->middleware('permission:Edit_Country', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete_Country', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries =Country::all();

        return view('admin/country/index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/country/create');
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
            'countryAr'=>'required',
            'countryEn'=>'required',
            'countryUr'=>'required',
        ]);
        $country=new Country();
        $country->countryAr=request('countryAr');
        $country->countryEn=request('countryEn');
        $country->countryUr=request('countryUr');
        $country->save();
        return redirect('admin/country')->with('success','تم اضافه البيانات بنجاح');
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
        $country=Country::find($id);
        return view('admin/country/edit',compact('country'));
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
        $country=Country::find($id);
        $this->validate(request(),[
            'countryAr'=>'required',
            'countryEn'=>'required',
            'countryUr'=>'required',
        ]);
        $country->countryAr=request('countryAr');
        $country->countryEn=request('countryEn');
        $country->countryUr=request('countryUr');

        $country->save();
        return redirect('admin/country')->with('success','تم تعديل البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country=Country::find($id);
        $country->delete();
        return back()->with('success','تم حذف البيانات بنجاح');

    }
}
