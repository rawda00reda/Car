<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services= Service::all();
        return view('admin.services.index',compact('services'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $image = request('img');
        $imagee = time() . '.' . $image->getClientOriginalExtension();
        $image_resize = Image::make($image->getRealPath());
//        $image_resize->resize(50, 54);
        $image_resize->save(public_path('images/services/' . $imagee));

        $service = new Service();
        $service->img = $imagee;
        $service->title_ar=request('title_ar');
        $service->title_en=request('title_en');
        $service->title_ur=request('title_ur');
        $service->body_ar=request('body_ar');
        $service->body_en=request('body_en');
        $service->body_ur=request('body_ur');

        $service->save();

        return redirect()->back()->with('success', trans('lang.saveb'));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $service=Service::find($service->id);
        return view('admin/services/edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Service $service)
    {

        $service = Service::findOrFail($service->id);

        if (request('img')){
            \File::delete(public_path('images/services/'.$service->img));
            $image = request('img');
            $imagee = time()  .$image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
//            $image_resize->resize(50, 54);
            $image_resize->save(public_path('images/services/' . $imagee));
            $service->img = $imagee;

        }

        $service->title_ar=request('title_ar');
        $service->title_en=request('title_en');
        $service->title_ur=request('title_ur');
        $service->body_ar=request('body_ar');
        $service->body_en=request('body_en');
        $service->body_ur=request('body_ur');


        $service->save();
        return redirect('/admin/services')->with('success', trans('lang.upb'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service = Service::findOrFail($service->id);
        \File::delete(public_path('/images/services/'.$service->image));
        $service->delete();
        return redirect()->back()->with('success', trans('lang.delb'));
    }
}
