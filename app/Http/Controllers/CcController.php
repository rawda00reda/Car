<?php

namespace App\Http\Controllers;

use App\Cc;
use App\Date;
use Illuminate\Http\Request;

class CcController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:View_Cc', ['only' => ['index']]);
        $this->middleware('permission:Add_Cc', ['only' => ['create','store']]);
        $this->middleware('permission:Edit_Cc', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete_Cc', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ccs=Cc::all();
        return view('admin/cc/index',compact('ccs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dates=Date::all();
        return view('admin/cc/create',compact('dates'));

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
            'cc' => 'required',
            'date_id' => 'required',

        ]);

        $cc =new Cc()  ;
        $cc->Cc = request('cc');
        $cc->date_id = request('date_id');
        $cc->save();

        return redirect('admin/cc')->with('success',trans('lang.saveb'));    }

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
        $cc=Cc::find($id);
        $dates=Date::all();
        return view('admin/cc/edit',compact('cc','dates'));
    }

    /**
     * UpCc the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'cc' => 'required',
            'date_id' => 'required',
        ]);

        $cc=Cc::find($id);
        $cc->Cc = request('cc');
        $cc->date_id = request('date_id');
        $cc->save();
        return redirect('admin/cc')->with('success',trans('lang.iupdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cc=Cc::find($id);
        $cc->delete();
        return redirect('admin/cc')->with('success',trans('lang.delb'));    }
}
