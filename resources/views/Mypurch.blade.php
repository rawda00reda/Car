{{--@dd($Mypurchs)--}}
@extends('app')
@section('content')
<!--**********************************************************-->
<!--**********************************************************-->
<!--********************** Shopping item ****************-->
<div class="container">
<div class="shopping">
   <h2 class="text-center"><i class="fas fa-shopping-basket"></i> user item Shopping</h2>
    <div class="row">
        <div class="col-md-5 col-5">
           <a href="index.html"><i class="fas fa-chevron-left"></i> Continue Shopping</a>
        </div>
        <div class="col-md-4 col-2"></div>
        <div class="col-md-3 col-5">
            <a href="#"> </a>
        </div>
    </div><br><br>
    <div class="row col-hed">
        <div class="col-md-3 col-3">
            <p>My Cart</p>
        </div>
        <div class="col-md-3 col-3"></div>
        <div class="col-md-2 col-2">Price</div>
        <div class="col-md-2 col-2">Qty</div>
        <div class="col-md-2 col-2">Total</div>
    </div>
@foreach($Mypurchs as $Mypurch)
     <div class="row items-cart">
        <div class="col-md-4 col-6">
           <div class="row">
               <div class="col-md-6 col-6">
                   <img src="{{asset('images/products/'.$Mypurch->img)}}" width="100" height="100">
               </div>
               <div class="col-md-6 col-6">
                   <p>product name:</p>
                   <p>
                       <span>{{$Mypurch->product_name}}</span><br>
                       <span>color:<span style="display: inline-block; background-color:{{$Mypurch->color}}; width: 37px;height: 14px; border-radius: 50%;"></span></span>
                   </p>
               </div>
           </div>
        </div>
        <div class="col-md-2 col-1"></div>
        <div class="col-md-2 col-2">
            <p>{{$Mypurch->priceB}}:SR</p>
        </div>
         <div class="col-md-2 col-2 qty">
             <input type="number" value="{{$Mypurch->amount}}">
         </div>
        <div class="col-md-2 col-2">
            <p>{{$Mypurch->subtotal}}</p>
        </div>
    </div>
    @endforeach





</div>
</div> <br><br>

<br><br>
@endsection
