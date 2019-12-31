<?php

namespace App\Http\Controllers;

use App\Welcome;
use Intervention\Image\Facades\Image;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $welcomes= Welcome::all();
        return view('admin.welcome.index',compact('welcomes'));
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
        $welcome = new Welcome();

        if (request('img')) {

            $image = request('img');
            $imagee = time() . '.' . $image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
//        $image_resize->resize(450, 286.88);
            $image_resize->save(public_path('images/welcomes/' . $imagee));
            $welcome->img = $imagee;

        }

        $welcome->title_ar=request('title_ar');
        $welcome->title_en=request('title_en');
        $welcome->title_ur=request('title_ur');
        $welcome->body_ar=request('body_ar');
        $welcome->body_en=request('body_en');
        $welcome->body_ur=request('body_ur');

        $welcome->save();

        return redirect()->back()->with('success', trans('lang.saveb'));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function show(Welcome $welcome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function edit(Welcome $welcome)
    {
        $welcome=Welcome::find($welcome->id);
        return view('admin/welcome/edit',compact('welcome'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Welcome $welcome)
    {

        $welcome = Welcome::findOrFail($welcome->id);

        if (request('img')){
            \File::delete(public_path('images/welcomes/'.$welcome->img));
            $image = request('img');
            $imagee = time() . '.' . $image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
//            $image_resize->resize(450, 286.88);
            $image_resize->save(public_path('images/welcomes/' .$imagee));
            $welcome->img = $imagee;

        }

        $welcome->title_ar=request('title_ar');
        $welcome->title_en=request('title_en');
        $welcome->title_ur=request('title_ur');
        $welcome->body_ar=request('body_ar');
        $welcome->body_en=request('body_en');
        $welcome->body_ur=request('body_ur');


        $welcome->save();
        return redirect('/admin/welcome')->with('success', trans('lang.upb'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function destroy(Welcome $welcome)
    {
        $welcome = Welcome::findOrFail($welcome->id);
        \File::delete(public_path('/images/welcomes/'.$welcome->img));
        $welcome->delete();
        return redirect()->back()->with('success', trans('lang.delb'));
    }
}
