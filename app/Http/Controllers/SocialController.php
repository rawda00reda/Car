<?php

namespace App\Http\Controllers;

use App\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index()
    {
        $socials = Social::orderBy('created_at', 'desc')->get();
        return view('admin.socials.index')->with('socials', $socials);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $social = new Social();
        $social->name = request('name');
        $social->link = request('link');
        $social->save();

        return redirect()->back()->with('success', trans('lang.saveb'));    }


    public function show(Social $social)
    {
        //
    }


    public function edit(Social $social)
    {
        $social=Social::find($social->id);
        return view('admin/socials/edit',compact('social'));
    }


    public function update(Request $request, Social $social)
    {
        //
    }

    public function destroy(Social $social)
    {
        $social = Social::findOrFail($social->id);
        $social->delete();
        return redirect()->back()->with('success', trans('lang.delb'));
    }
}
