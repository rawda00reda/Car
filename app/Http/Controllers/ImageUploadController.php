<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{

    public function fileCreate()
    {
        return view('admin.product.imageupload');
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
