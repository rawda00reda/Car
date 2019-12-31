<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:View_Branch', ['only' => ['index']]);
        $this->middleware('permission:Add_Branch', ['only' => ['create','store']]);
        $this->middleware('permission:Edit_Branch', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete_Branch', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branchs=Branch::all();
        return view('admin/branchs/index',compact('branchs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/branchs/create');

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

        $branch =new Branch()  ;
        $branch->titleAr = request('titleAr');
        $branch->titleEn = request('titleEn');
        $branch->titleUr = request('titleUr');
        $branch->save();

        return redirect('admin/branch')->with('success',trans('lang.saveb'));    }

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
        $branch=Branch::find($id);
        return view('admin/branchs/edit',compact('branch'));
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
        $branch=Branch::find($id);
        $branch->titleAr = request('titleAr');
        $branch->titleEn = request('titleEn');
        $branch->titleUr = request('titleUr');
        $branch->save();
        return redirect('admin/branch')->with('success',trans('lang.iupdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch=Branch::find($id);
        $branch->delete();
        return redirect('admin/branch')->with('success',trans('lang.delb'));    }
}
