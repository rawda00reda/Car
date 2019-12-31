<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs=Faq::all();
        return view('admin.faq.index',compact('faqs'));
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




        $faq = new Faq();
        $faq->qus_ar=request('qus_ar');
        $faq->qus_en=request('qus_en');
        $faq->qus_ur=request('qus_ur');
        $faq->body_ar=request('body_ar');
        $faq->body_en=request('body_en');
        $faq->body_ur=request('body_ur');

        $faq->save();

        return redirect()->back()->with('success', trans('lang.saveb'));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        $faq=Faq::find($faq->id);
        return view('admin/faq/edit',compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Faq $faq)
    {

        $faq = Faq::findOrFail($faq->id);



        $faq->qus_ar=request('qus_ar');
        $faq->qus_en=request('qus_en');
        $faq->qus_ur=request('qus_ur');
        $faq->body_ar=request('body_ar');
        $faq->body_en=request('body_en');
        $faq->body_ur=request('body_ur');


        $faq->save();
        return redirect('/admin/faq')->with('success', trans('lang.upb'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq = Faq::findOrFail($faq->id);
        $faq->delete();
        return redirect()->back()->with('success', trans('lang.delb'));
    }
}
