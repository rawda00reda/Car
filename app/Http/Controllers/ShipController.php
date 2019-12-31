<?php

namespace App\Http\Controllers;

use App\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShipController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:view_NewOrder', ['only' => ['index']]);
        $this->middleware('permission:view_DelteOrder', ['only' => ['deleteorders','reject','deleteorderss']]);
        $this->middleware('permission:view_TransferOrders', ['only' => ['ship','transferorders','shiporder']]);
        $this->middleware('permission:acceptNewOrder', ['only' => ['acceptorders','accept','acceptorderss']]);
    }
    public function index()
    {
        $role=Auth::user()->hasRole('Super Admin');
        if ($role){
        $shipments =Shipment::where('status','no')->get();
        return view('admin/shipments/index',compact('shipments'));
    }
        $shipments =Shipment::where('status','no')
            ->where('companyName',Auth::user()->name)->get();
        return view('admin/shipments/index',compact('shipments'));
    }
    public function ship($id){
        $ship=Shipment::where('id',$id)
            ->update(['shipments.status'=> 'transfer']);
            $ship=Shipment::where('id',$id)
                ->update(['shipments.shippingName'=> request('shippingName')]);
        return redirect('/admin/shipments')->with('success','تم تحويل الطلب بنجاح الي ' .request('shippingName'));
    }
    public function transferorders(){

        $role=Auth::user()->hasRole('Super Admin');
        if ($role){
            $shipments =Shipment::where('status','transfer')->get();
            return view('admin/shipments/transfer',compact('shipments'));
        }

        $shipments =Shipment::where('status','transfer')
            ->wher('shippingName',Auth::user()->name)->get();
        return view('admin/shipments/transfer',compact('shipments'));
    }
    public function shiporder(){
        $role=Auth::user()->hasRole('Super Admin');
        if ($role){
            $shipment =Shipment::where('status','transfer')->get();
            return view('admin/shipments/ship',compact('shipment'));

        }

        $shipment =Shipment::where('status','transfer')
            ->where('shippingName',Auth::user()->name)->get();
        return view('admin/shipments/ship',compact('shipment'));
    }
    public function reject(){
        $role=Auth::user()->hasRole('Super Admin');
        if ($role){
            $shipments =Shipment::where('status','delete')->get();
            return view('admin/shipments/reject',compact('shipments'));
        }

        $shipments =Shipment::where('status','delete')
            ->where('shippingName',Auth::user()->name)->get();
        return view('admin/shipments/delete',compact('shipments'));
    }
    public function accept(){
        $role=Auth::user()->hasRole('Super Admin');
        if ($role){
            $shipments =Shipment::where('status','accept')->get();
            return view('admin/shipments/accep',compact('shipments'));
        }

        $shipments =Shipment::where('status','accept')
            ->where('shippingName',Auth::user()->name)->get();
        return view('admin/shipments/accep',compact('shipments'));
    }
    public function deleteorderss(){
        $role=Auth::user()->hasRole('Super Admin');
        if ($role){
            $shipments =Shipment::where('status','delete')->get();
            return view('admin/shipments/delete',compact('shipments'));
        }

        $shipments =Shipment::where('status','delete')
            ->where('shippingName',Auth::user()->name)->get();
        return view('admin/shipments/delete',compact('shipments'));
    }
    public function acceptorderss(){
        $role=Auth::user()->hasRole('Super Admin');
        if ($role){
            $shipments =Shipment::where('status','accept')->get();
            return view('admin/shipments/accept',compact('shipments'));
        }

        $shipments =Shipment::where('status','accept')
            ->where('shippingName',Auth::user()->name)->get();
        return view('admin/shipments/accept',compact('shipments'));
    }
    public function acceptorders($id){
        $ship=Shipment::where('id',$id)
            ->update(['shipments.status'=> 'accept']);
        return redirect('/admin/shiporder')->with('success','تم قبول الطلب بنجاح ');
    }
    public function deleteorders($id){
        $ship=Shipment::where('id',$id)
            ->update(['shipments.status'=> 'delete']);
        return redirect('/admin/shiporder')->with('success','تم رفض الطلب بنجاح ');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $items=color::all();
        return view('admin/shipments/create',compact('items','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name'=>'required',
            'phone'=>'required',
            'proname'=>'required',
            'amount'=>'required',
            'color'=>'required',
        ]);
        $ship=new Shipment();
        $ship->	user_name=request('name');
        $ship->phone=request('phone');
        $ship->product_name	=request('proname');
        $ship->amount=request('amount');
        $ship->color=request('color');
        $ship->save();
        return redirect('admin/shipments')->with('success','تم اضافه البيانات بنجاح');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colors=color::all();
        $ship=Shipment::find($id);
        return view('admin/shipments/edit',compact('ship','colors'));
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
        $ship=Shipment::find($id);
        $this->validate(request(),[
            'Ship_num'=>'required',
            'client'=>'required',
            'phone'=>'required',
            'product_num'=>'required',
            'amount'=>'required',
            'color'=>'required',
            'confirm'=>'required',
            'shipping'=>'required',
            'eval'=>'required',
        ]);
        $ship->Ship_num=request('Ship_num');
        $ship->client=request('client');
        $ship->phone=request('phone');
        $ship->product_num=request('product_num');
        $ship->amount=request('amount');
        $ship->color=request('color');
        $ship->confirm=request('confirm');
        $ship->shipping=request('shipping');
        $ship->notes=request('notes');
        $ship->notes=request('eval');

        $ship->save();
        return redirect('admin/shipments')->with('success','تم تعديل البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ship=Shipment::find($id);
        $ship->delete();
        return back()->with('success','تم حذف البيانات بنجاح');

    }


}
