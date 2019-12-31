@extends('app')
@section('content')
<!--**********************************************************-->
<!--**********************************************************-->
<br><br><br><br><br>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-7 form-left-check">
       <form method="POST" id="login" class="well" action="{{url(LaravelLocalization::getCurrentLocale().'/check')}}"  enctype="multipart/form-data">
           {{ csrf_field() }}
           <div class="form-group"></div>
         <div class="form-group">
               <label>@lang('lang.name')</label>
               <input type="text" aria-invalid="true" class="form-control" name="name" value="{{Auth::user()->name}}" placeholder="Enter Email">
           </div>
         <div class="form-group">
             <label>@lang('lang.email')</label>
             <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" placeholder="Enter Email">
         </div>
         <div class="form-group">
             <label>@lang('lang.phone') </label>
             <input type="number" class="form-control" name="mobile" value="{{Auth::user()->mobile}}" placeholder="Enter Phone number">
         </div>
         <div class="form-group">
             <label>@lang('lang.address')</label>
             <div class="row">
                 <div class="col-md-6">
                     <label>@lang('lang.city') </label>
                     <input type="text" class="form-control" name="city"  placeholder="@lang('lang.city') ">
                 </div>
                 <div class="col-md-6">
                     <label>@lang('lang.country') </label>
                     <input type="text" class="form-control" name="country"  placeholder="@lang('lang.country') ">
                 </div>
             </div>
         </div>
         <div class="form-group">
             <label>@lang('lang.street'). </label>
             <input type="text" name="address" class="form-control" placeholder="@lang('lang.street')  ">
         </div>
         <div class="form-group">
             <label>@lang('lang.note')</label>
             <textarea name="note" id="" class="form-control"></textarea>
         </div>
         <button type="submit" class="form-control btn-warning">@lang('lang.save')</button><br>
         <p class="text-center"> <a href="/cart">@lang('lang.BackCart')</a></p>
     </form>

   </div>

            <div class="col-md-5 checkout-info">
            <div class="row" id="login">
                <div class="col-md-7"><h6>@lang('lang.SHOPPINGCART')</h6></div>
                <div class="col-md-5 text-right"><a href="/cart">@lang('lang.BackCart')</a></div>
            </div>
            <hr>
       <div class="row">
           @foreach(Cart::content() as $product)
           <div class="col-md-12">
             <div class="row">
               <div class="col-md-3 col-3">
                   <img src="{{asset('images/products/'.$product->options->img)}}" style="    width: 110px;">
               </div>
               <div class="col-md-9 col-9">
                   <p>@lang('lang.pname').....{{$product->name}}</p>
                   <p class="price">{{$product->price}}:SR</p>
                   <p>@lang('lang.Quantity'): {{$product->qty}}</p>
               </div>
            </div>
         </div>
           @endforeach
               <div class="col-md-12">
                   <div class="row">
                       <div class="col-md-6 col-6">@lang('lang.subtotal')  </div>
                       <div class="col-md-6 col-6">{{Cart::subtotal()}}</div>
                   </div>
               </div>
               <div class="col-md-12">
                   <div class="row">
                       <div class="col-md-6 col-6">@lang('lang.shipping') </div>
                       <div class="col-md-6 col-6">{{Cart::tax()}}</div>
                   </div>
               </div>
           <div class="col-md-12">
               <div class="row">
                   <div class="col-md-6 col-6"><b>@lang('lang.total') </b></div>
                   <div class="col-md-6 col-6"><b>{{Cart::total()}}</b></div>
               </div>
           </div>
           <br><br>
           <button class="btn btn-warning form-control">@lang('lang.save')</button>
       </div>
   </div>
</div>
</div>
</section>

<br><br>
<!-- ************************************************************************* -->
@endsection
