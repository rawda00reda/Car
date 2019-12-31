<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public  function id($id){
        $products=Product::where('id',$id)->get();
        return view('product',compact('products'));

    }
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $products = Product::all();

        return view('admin.product.show',compact('product','products'));
    }






    public function store(Request $request)
    {


        $image = request('img');
        $imagee = time() . 'product.' . $image->getClientOriginalExtension();
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(155, 155);
        $image_resize->save(public_path('images/products/' . $imagee));

        $product = new Product();
        $product->img = $imagee;
        $product->name_ar=request('name_ar');
        $product->name_en=request('name_en');
        $product->name_ur=request('name_ur');
        $product->info_ar=request('info_ar');
        $product->info_en=request('info_en');
        $product->info_ur=request('info_ur');
        $product->price=request('price');
        $product->stock=request('stock');
        $product->color=request('color');
        $product->condition=request('condition');
        $product->SoldBy=request('SoldBy');


        $product->save();

        return redirect()->back()->with('success', trans('lang.saveb'));


    }


    public function edit(Product $product)
    {
        $product=Product::find($product->id);
        return view('admin/product/edit',compact('product'));
    }



    public function update(Request $request,Product $product)
    {

        $product = Product::findOrFail($product->id);

        if (request()->hasFile('img'))
        {
            $this->validate(request(),[
                'img'=>'required|image|',
            ]);
            $image = request('img');
            $imagee = time() . '.' .$image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(155, 155);
            $image_resize->save(public_path('images/products/' .$imagee));
            $product->img=$imagee;
            $product->save();
            return redirect('/admin/product')->with('success', trans('lang.upb'));
        }

        $product->name_ar=request('name_ar');
        $product->name_en=request('name_en');
        $product->name_ur=request('name_ur');
        $product->info_ar=request('info_ar');
        $product->info_en=request('info_en');
        $product->info_ur=request('info_ur');
        $product->price=request('price');
        $product->stock=request('stock');
        $product->color=request('color');
        $product->condition=request('condition');
        $product->SoldBy=request('SoldBy');

        $product->save();
        return redirect('/admin/product')->with('success', trans('lang.upb'));


    }



    public function destroy(Product $product)
    {
        $product = Product::findOrFail($product->id);
        \File::delete(public_path('/images/products/'.$product->image));
        $product->delete();
        return redirect()->back()->with('success', trans('lang.delb'));
    }
    public function fileStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images/products'),$imageName);

        $imageUpload = new Product();
        $imageUpload->filename = $imageName;
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }
    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        Product::where('filename',$filename)->delete();
        $path=public_path().'/images/products'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }

}
