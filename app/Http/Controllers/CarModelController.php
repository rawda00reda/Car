<?php

namespace App\Http\Controllers;

use App\Brand;
use App\CarMode;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:View_CarModel', ['only' => ['index']]);
        $this->middleware('permission:Add_CarModel', ['only' => ['create','store']]);
        $this->middleware('permission:Edit_CarModel', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete_CarModel', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carmodels=CarMode::all();
        return view('admin/carmodel/index',compact('carmodels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands=Brand::all();

        return view('admin/carmodel/create',compact('brands'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titleAr' => 'required',
            'titleEn' => 'required',
            'titleUr' => 'required',
            'brand_id'=>'required',
        ]);

        $carmodels =new CarMode()  ;
        $carmodels->brand_id=request('brand_id');
        $carmodels->titleAr = request('titleAr');
        $carmodels->titleEn = request('titleEn');
        $carmodels->titleUr = request('titleUr');
        $carmodels->save();

        return redirect('admin/carmodel')->with('success',trans('lang.saveb'));    }

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
        $carmodels=CarMode::find($id);
        $brands=Brand::all();
        return view('admin/carmodel/edit',compact('carmodels','brands'));
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
        $this->validate($request, [
            'titleAr' => 'required',
            'titleEn' => 'required',
            'titleUr' => 'required',
             'brand_id'=>'required',
        ]);
        $carmodels=CarMode::find($id);
        $carmodels->titleAr = request('titleAr');
        $carmodels->titleEn = request('titleEn');
        $carmodels->titleUr = request('titleUr');
        $carmodels->brand_id=request('brand_id');
        $carmodels->save();
        return redirect('admin/carmodel')->with('success',trans('lang.iupdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carmodels=CarMode::find($id);
        $carmodels->delete();
        return redirect('admin/carmodel')->with('success',trans('lang.delb'));    }
}
