<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Shipment;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('checkout');
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

        $carts=Cart::content();
        foreach ($carts as $cart){
            $ship =new Shipment();
            $ship->user_id=Auth::user()->id;
            $ship->user_name=Auth::user()->name;
            $ship->phone=Auth::user()->mobile;
            $ship->color=$cart->options->color;
            $ship->img=$cart->options->img;
            $ship->product_id=$cart->id;
            $ship->product_name=$cart->name;
            $ship->companyName=$cart->options->companyName;
            $ship->amount=$cart->qty;
            $ship->priceA=$cart->price;
            $ship->priceB=$cart->options->priceB;
            $ship->subtotal=$cart->subtotal;
            $ship->subtotal=$cart->subtotal;
            $ship->total=$cart->total;
            $ship->taxs=$cart->tax;
            $ship->city	=request('city');
            $ship->country	=request('country');
            $ship->address	=request('address');
            $ship->note	=request('note');
            $ship->save();

        }


        foreach ($carts as $item) {
            $product = Product::find($item->id)::where('color',$item->options->color);
            $product->decrement('stock', $item->qty);
        }

        Cart::instance('default')->destroy();


        return view('check');


//        $order=new Order();
//        $order->user_id=Auth::user()->id;
//        $order->email=Auth::user()->email;
//        $order->phone=Auth::user()->mobile;
//        $order->name=Auth::user()->name;
//        $order->address=request('address');
//        $order->city=request('city');
//        $order->country=request('country');
//        $order->note=request('note');
//        $order->save();
//        return redirect()->back();
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
        //
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
        //
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
