<?php

namespace App\Http\Controllers;

use App\Product;
use App\More;
use App\Shipment;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        Cart::add([
            'id' => $request->id,         //product id
            'name' => $request->name,     //product name
            'qty' => $request->qty,        //product qty
            'price' => $request->priceA,    //product price
            'options' => [
                'color' => $request->color,
                'companyName' => $request->companyName,
                'img' => $request->img,
                'priceB' => $request->priceB,

            ]
        ]);


        return redirect('/cart')->with('success','Item Was Added To Your Cart');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $carts=Cart::content();
        foreach ($carts as $cart){
            $ship =new Shipment();
            $ship->user_id=Auth::user()->id;
            $ship->user_name=Auth::user()->name;
            $ship->phone=Auth::user()->phone;
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
            $ship->save();

        }

        foreach ($carts as $item) {
            $product = Product::find($item->id)::where('color',$item->options->color);
            $product->decrement('stock', $item->qty);
        }
        return view('check');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function find()
    {
        $product=Shipment::where('user_id' , auth()->user()->id)->get();
        return view('profil' , compact('product'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Cart::remove($id);
        return back();

    }
}
