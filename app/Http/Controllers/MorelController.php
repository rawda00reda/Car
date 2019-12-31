<?php

namespace App\Http\Controllers;

use App\AddProduct;
use App\color;
use App\More;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class MorelController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:view_product', ['only' => ['index']]);
        $this->middleware('permission:add_product', ['only' => ['create','store']]);
        $this->middleware('permission:edit_product', ['only' => ['edit','update']]);
        $this->middleware('permission:delete_product', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $productss=More::where('pro_id',$id)->get();
        return view('admin/more/index',compact('productss','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin/more/create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $this->validate(request(),[
            'stock'=>'required',
            'color'=>'required',
            'priceA'=>'required',
            'priceB'=>'required',
            'img'=>'required|image|',
        ]);


        $product =new More();

        $image = request('img');
        $imagee = time() . '.' .$image->getClientOriginalExtension();
        $image_resize = Image::make($image->getRealPath());
//        $image_resize->resize(360, 280);
        $image_resize->save(public_path('images/products/' .$imagee));

        $product->pro_id=$id;
        $product->stock=request('stock');
        $product->color=request('color');
        $product->priceA=request('priceA');
        $product->priceB=request('priceB');
        $product->img=$imagee;
        $product->save();
        return redirect('admin/more/'.$id.'/find')->with('success',trans('lang.saveb'));
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
    public function destroy($id , $ide)
    {
        $pro=More::find($ide);
        \File::delete(public_path('images/products/'.$pro->img));
        $pro->delete();
        return back()->with('success',trans('lang.delb'));

    }
}
