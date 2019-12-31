<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:View_Brand', ['only' => ['index']]);
        $this->middleware('permission:Add_Brand', ['only' => ['create','store']]);
        $this->middleware('permission:Edit_Brand', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete_Brand', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brand::all();
        return view('admin/brand/index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/brand/create');

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
            'titleUr' => 'required'
        ]);

        $brand =new Brand()  ;
        $brand->titleAr = request('titleAr');
        $brand->titleEn = request('titleEn');
        $brand->titleUr = request('titleUr');
        $brand->save();

        return redirect('admin/brand')->with('success',trans('lang.saveb'));    }

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
        $brand=Brand::find($id);
        return view('admin/brand/edit',compact('brand'));
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
            'titleUr' => 'required'
        ]);
        $brand=Brand::find($id);
        $brand->titleAr = request('titleAr');
        $brand->titleEn = request('titleEn');
        $brand->titleUr = request('titleUr');
        $brand->save();
        return redirect('admin/brand')->with('success',trans('lang.iupdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand=Brand::find($id);
        $brand->delete();
        return redirect('admin/brand')->with('success',trans('lang.delb'));    }
}
