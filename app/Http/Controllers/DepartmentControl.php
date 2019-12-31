<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Department;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class DepartmentControl extends Controller
{
    function __construct()
    {
        $this->middleware('permission:View_Department', ['only' => ['index']]);
        $this->middleware('permission:Add_Department', ['only' => ['create','store']]);
        $this->middleware('permission:Edit_Department', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete_Department', ['only' => ['destroy']]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depts=Department::all();
        return view('admin/depts/index',compact('depts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/depts/create');
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

        $dept =new Department()  ;
        $dept->titleAr = request('titleAr');
        $dept->titleEn = request('titleEn');
        $dept->titleUr = request('titleUr');
        $dept->save();

        return redirect('admin/depts')->with('success',trans('lang.saveb'));

    }

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
        $dept=Department::find($id);
        return view('admin/depts/edit',compact('dept'));
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
        $dept=Department::find($id);
        $dept->titleAr = request('titleAr');
        $dept->titleEn = request('titleEn');
        $dept->titleUr = request('titleUr');
        $dept->save();
        return redirect('admin/depts')->with('success',trans('lang.iupdate'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dept=Department::find($id);
        $dept->delete();
        return redirect('admin/depts')->with('success',trans('lang.delb'));

    }
}
