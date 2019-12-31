<?php

namespace App\Http\Controllers;

use App\Date;
use Illuminate\Http\Request;

class DateController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:view_ProdDate', ['only' => ['index']]);
        $this->middleware('permission:Add_ProdDate', ['only' => ['create','store']]);
        $this->middleware('permission:Edit_ProdDate', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete_ProdDate', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dates=Date::all();
        return view('admin/date/index',compact('dates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/date/create');

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
            'date' => 'required',

        ]);

        $date =new Date()  ;
        $date->date = request('date');

        $date->save();

        return redirect('admin/date')->with('success',trans('lang.saveb'));    }

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
        $date=Date::find($id);
        return view('admin/date/edit',compact('date'));
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
            'date' => 'required',

        ]);
        $date=Date::find($id);
        $date->date = request('date');

        $date->save();
        return redirect('admin/date')->with('success',trans('lang.iupdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $date=Date::find($id);
        $date->delete();
        return redirect('admin/date')->with('success',trans('lang.delb'));    }
}
