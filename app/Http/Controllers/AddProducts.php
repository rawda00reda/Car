<?php

namespace App\Http\Controllers;
use App\Branch;
use App\Brand;
use App\CarMode;
use App\Cc;
use App\Date;
use App\Department;
use App\More;
use App\Product;
use App\Shipment;
use App\Special;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class AddProducts extends Controller
{
    function __construct()
    {
        $this->middleware('permission:view_product', ['only' => ['index']]);
        $this->middleware('permission:add_product', ['only' => ['create','store']]);
        $this->middleware('permission:edit_product', ['only' => ['edit','update']]);
        $this->middleware('permission:delete_product', ['only' => ['destroy']]);
    }

    public function find($id)
    {
        $prodinfos=Product::where('id',$id)->get();
        $infos=More::where('pro_id',$id)->get();
        return view('product',compact('prodinfos','infos'));

    }

    public function userdate($id){
        $user=Shipment::find($id);
        return view('admin.userdata',compact('user'));
    }

    public function productdata($id){
        $product=Product::find($id);
        $ProductData=More::where('pro_id' , $id)->get();
        $specials=Special::all();
        $depts=Department::all();
        $branchs=Branch::all();
//        dd($ProductData);
        return view('admin/productdata',compact('branchs','depts','specials','product','ProductData'));
    }

    public function orderdetails($id){
        $order=Shipment::find($id);
        return view('admin.orderdetails',compact('order'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->email==="em29121992@gmailcom"){
            $products=Product::all();
            return view('admin/addproduct/index',compact('products'));
        }

        $products=Product::where('companyName',Auth::user()->name)->get();
        return view('admin/addproduct/index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $depts=Department::all();
        $brands=Brand::all();
        $models=CarMode::all();
        $ccs=Cc::all();
        $prodates=Date::all();
        return view('admin/addproduct/create',compact('models','depts','brands','ccs','prodates'));

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
            'deptEn'=>'required',
            'deptAr'=>'required',
            'deptUr'=>'required',
            'brandEn'=>'required',
            'brandAr'=>'required',
            'brandUr'=>'required',
            'modelEn'=>'required',
            'modelAr'=>'required',
            'modelUr'=>'required',
            'cc'=>'required',
            'prodate'=>'required',
            'nameEn'=>'required',
            'nameAr'=>'required',
            'nameUr'=>'required',
            'priceB'=>'required',
            'priceA'=>'required',
            'img'=>'required|image|',
            'stock'=>'required',
            'color'=>'required',
            'infoUr'=>'required',
            'infoEn'=>'required',
            'infoAr'=>'required',
        ]);


        $image = request('img');
        $imagee = time() . '.' .$image->getClientOriginalExtension();
        $image_resize = Image::make($image->getRealPath());
//        $image_resize->resize(360, 280);
        $image_resize->save(public_path('images/products/' .$imagee));


        $product =new Product();
        $product->deptEn=request('deptEn');
        $product->deptAr=request('deptAr');
        $product->deptUr=request('deptUr');
        $product->brandEn=request('brandEn');
        $product->brandAr=request('brandAr');
        $product->brandUr=request('brandUr');
        $product->modelEn=request('modelEn');
        $product->modelAr=request('modelAr');
        $product->modelUr=request('modelUr');
        $product->cc=request('cc');
        $product->prodate=request('prodate');
        $product->proEn=request('nameEn');
        $product->proAr=request('nameAr');
        $product->proUr=request('nameUr');
        $product->priceB=request('priceB');
        $product->priceA=request('priceA');
        $product->stock=request('stock');
        $product->color=request('color');
        $product->infoEn=request('infoEn');
        $product->infoAr=request('infoAr');
        $product->infoUr=request('infoUr');
        $product->img=$imagee;
        $product->publish = request('publish');
        $product->companyName=Auth::user()->name;
        $product->save();

        return redirect('admin/addproduct')->with('success',trans('lang.saveb'));
    }


    public function edit($id)
    {
        $product=Product::find($id);
        $specials=Special::all();
        $depts=Department::all();
        $branchs=Branch::all();
        return view('admin/addproduct/edit',compact('branchs','depts','specials','product'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//
//        $brande= AddProduct::where('deptEn', $id)->distinct('brandEn')->pluck('brandEn');
//
//
//        return view('products',compact('product','brande'));
//
//    }
//
//    public function cat(Request $request,$id)
//    {
//
//        if ($request->has('brandes')) {
//            $brande= AddProduct::where('deptEn', $id)->distinct('brandEn')->pluck('brandEn');
//            $products = AddProduct::where('deptEn', $id)->where('brandEn', $request->get('brandes'))->get();
//            return view('pros', compact('products', 'brande'));
//        }
//        $brande= AddProduct::where('deptEn', $id)->distinct('brandEn')->pluck('brandEn');
//        $products=AddProduct::where('deptEn',$id)->get();
//        return view('pros', compact('products', 'brande'));
//
//    }
//    public function brand(Request $request,$id , $ide)
//    {
//
//        if ($request->has('brandes')) {
//            $brande= AddProduct::where('deptEn', $id)->distinct('brandEn')->pluck('brandEn');
//            $products = AddProduct::where('deptEn', $id)->where('brandEn', $request->get('brandes'))->get();
//            return view('pros', compact('products', 'brande'));
//        }
//        $brande= AddProduct::where('deptEn', $id)->distinct('brandEn')->pluck('brandEn');
//        $products = AddProduct::where('deptEn', $id)->where('brandEn', $ide)->get();
//        return view('pros', compact('products', 'brande'));
//
//
//
//    }
//
//
//    public function find($id)
//    {
//        $prodinfos=AddProduct::where('id',$id)->get();
//        $infos=More::where('pro_id',$id)->get();
//        return view('prodinfo',compact('prodinfos','infos'));
//
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        if (request()->hasFile('img'))
        {
            $this->validate(request(),[
                'img'=>'required|image|',
            ]);
            $image = request('img');
            $imagee = time() . '.' .$image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
//            $image_resize->resize(360, 280);
            $image_resize->save(public_path('images/products/' .$imagee));
            $product->img=$imagee;
        }

if (request('priceB') < request('priceA')) {
    return back()->with('danger','من فضلك تاكد ان سعر المنتج قبل الخصم اكبر من سعر المنتج بعد الخصم ');


}
else{
    $this->validate(request(),[
        'deptEn'=>'required',
        'deptAr'=>'required',
        'deptUr'=>'required',
        'specialEn'=>'required',
        'specialAr'=>'required',
        'specialUr'=>'required',
        'branchEn'=>'required',
        'branchAr'=>'required',
        'branchUr'=>'required',
        'nameEn'=>'required',
        'nameAr'=>'required',
        'nameUr'=>'required',
        'priceB'=>'required',
        'priceA'=>'required',
        'stock'=>'required',
        'color'=>'required',
        'infoUr'=>'required',
        'infoEn'=>'required',
        'infoAr'=>'required',
    ]);
    $product->deptEn=request('deptEn');
    $product->deptAr=request('deptAr');
    $product->deptUr=request('deptUr');
    $product->specialEn=request('specialEn');
    $product->specialAr=request('specialAr');
    $product->specialUr=request('specialUr');
    $product->branchEn=request('branchEn');
    $product->branchAr=request('branchAr');
    $product->branchUr=request('branchUr');
    $product->proEn=request('nameEn');
    $product->proAr=request('nameAr');
    $product->proUr=request('nameUr');
    $product->priceB=request('priceB');
    $product->priceA=request('priceA');
    $product->stock=request('stock');
    $product->color=request('color');
    $product->infoEn=request('infoEn');
    $product->infoAr=request('infoAr');
    $product->infoUr=request('infoUr');
    $product->companyName=Auth::user()->name;
    $product->publish = request('publish');
    $product->save();
    return redirect('admin/addproduct')->with('success',trans('lang.iupdate'));
}
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infos=More::where('pro_id',$id);
//        \File::delete(public_path('images/products/'.$infos->img));
         $infos->delete();
        $product=Product::find($id);
        \File::delete(public_path('images/products/'.$product->img));
        $product->delete();
        return redirect('admin/addproduct')->with('success','تم حذف البيانات بنجاح');
    }
}
