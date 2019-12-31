<?php

namespace App\Http\Controllers;

use App\Permission;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class Suppliers extends Controller
{

    public function __construct()
    {


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        $user = User::find($id);
        return view('admin.suppliers.edit', compact('user'));
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
            'name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        // Get the user
        $user = User::findOrFail($id);

        if (request()->hasFile('logo'))
        {
            $image = request('logo');
            $imagee = time() . '.' .$image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->save(public_path('images/'.$imagee));
            $user->logo=time() . '.' .request('logo')->getClientOriginalExtension();
        }

        // check for password change
        if($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }
        $user->name=request('name');
        $user->mobile=request('mobile');
        $user->email=request('email');
        $user->country_id=request('country');
        $user->city_id=request('city');
        $user->address=request('address');
        $user->save();
        return redirect('admin/Suppliers')->with('success',trans('lang.iupdate'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
