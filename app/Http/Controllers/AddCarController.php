<?php

namespace App\Http\Controllers;

use App\Addcar;
use App\Brand;
use App\CarMode;
use App\Cc;
use App\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class AddCarController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:view_Car', ['only' => ['index']]);
        $this->middleware('permission:Add_Car', ['only' => ['create','store']]);
        $this->middleware('permission:Edit_Car', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete_Car', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role=Auth::user()->hasRole('Super Admin');
        if ($role){
            $products=Addcar::all();
            return view('admin/addcar/index',compact('products'));
        }

        $products=Addcar::where('companyName',Auth::user()->name)->get();
        return view('admin/addcar/index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands=Brand::all();
        $models=CarMode::all();
        $ccs=Cc::all();
        $prodates=Date::all();
        return view('admin/addcar/create',compact('brands','models','ccs','prodates'));

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
            'brandEn'=>'required',
            'brandAr'=>'required',
            'brandUr'=>'required',
            'modelEn'=>'required',
            'modelAr'=>'required',
            'modelUr'=>'required',
            'cc'=>'required',
            'prodate'=>'required',
            'img'=>'required|image|',
            'infoUr'=>'required',
            'infoEn'=>'required',
            'infoAr'=>'required',
        ]);


        $image = request('img');
        $imagee = time() . '.' .$image->getClientOriginalExtension();
        $image_resize = Image::make($image->getRealPath());
//        $image_resize->resize(360, 280);
        $image_resize->save(public_path('images/products/' .$imagee));

        $product =new Addcar();
        $product->brandEn=request('brandEn');
        $product->brandAr=request('brandAr');
        $product->brandUr=request('brandUr');
        $product->modelEn=request('modelEn');
        $product->modelAr=request('modelAr');
        $product->modelUr=request('modelUr');
        $product->cc=request('cc');
        $product->prodate=request('prodate');
        $product->infoEn=request('infoEn');
        $product->infoAr=request('infoAr');
        $product->infoUr=request('infoUr');
        $product->img=$imagee;
        $product->companyName=Auth::user()->name;
        $product->save();

        return redirect('admin/addcar')->with('success',trans('lang.saveb'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
