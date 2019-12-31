<?php

namespace App\Http\Controllers;

use App\Special;
use Illuminate\Http\Request;

class SpecialController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:View_Special', ['only' => ['index']]);
        $this->middleware('permission:Add_Special', ['only' => ['create','store']]);
        $this->middleware('permission:Edit_Special', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete_Special', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specials=Special::all();
        return view('admin/specials/index',compact('specials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/specials/create');

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

        $special =new Special()  ;
        $special->titleAr = request('titleAr');
        $special->titleEn = request('titleEn');
        $special->titleUr = request('titleUr');
        $special->save();

        return redirect('admin/special')->with('success',trans('lang.saveb'));    }

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
        $special=Special::find($id);
        return view('admin/specials/edit',compact('special'));
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
        $special=Special::find($id);
        $special->titleAr = request('titleAr');
        $special->titleEn = request('titleEn');
        $special->titleUr = request('titleUr');
        $special->save();
        return redirect('admin/special')->with('success',trans('lang.iupdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $special=Special::find($id);
        $special->delete();
        return redirect('admin/special')->with('success',trans('lang.delb'));    }
}
