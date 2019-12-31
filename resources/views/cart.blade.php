@extends('app')
@section('content')
    <br><br><br><br>

    <!--********************* END HEADER *************************-->
<div class="container">
    <div class="shopping">
        <form method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/cart')}}"  enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-5 col-5">
                    <a href="/"><i class="fas fa-chevron-left"></i>@lang('lang.ContinueShopping')</a>
                </div>
                <div class="col-md-4 col-2"></div>
                <form method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/check')}}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-md-3 col-6 but text-right">
                        <a href="/check"><i class="fas fa-shopping-basket"></i>@lang('lang.checkout')</a>
                    </div>
                </form>
            </div><br><br>
            <div class="row col-hed">
                <div class="col-md-6 col-4">
                    <p class="text-center">@lang('lang.MyCart')</p>
                </div>
                <!--        <div class="col-md-2 col-2"></div>-->
                <div class="col-md-2 col-2">@lang('lang.price')</div>
                <div class="col-md-2 col-2">@lang('lang.Quantity')</div>
                <div class="col-md-2 col-2">@lang('lang.total')</div>
            </div>

            @foreach(Cart::content() as $product)
                <div class="row items-cart">
                    <div class="col-md-6 col-6">
                        <div class="row">
                            <div class="col-md-6 col-6">
                                <br>
                                <img src="{{asset('images/products/'.$product->options->img)}}" width="100" height="100">
                            </div>
                            <div class="col-md-6 col-6">
                                <p>@lang('lang.ProductName'): {{$product->name}}</p>
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <p>
                                    <span>@lang('lang.color'):<span style="display: inline-block; background-color:{{$product->options->color}}; width: 37px;height: 14px; border-radius: 50%;"></span></span>
                                        <input type="hidden" name="color" value="{{$product->options->color}}">
                                    </p>
                                    <form method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/cart',$product->rowId)}}"  enctype="multipart/form-data">

                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button  type="submit" class="btn btn-block btn-danger" style="background-color: #0a84c6;">@lang('lang.Remove')</button >
                                        @csrf
                                    </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-2">
                        <br>
                        <p>{{$product->price}}:SR</p>
                    </div>

                    <div class="col-md-2 col-2 qty">
                        <br>
                        <input type="text" name="stock" value="{{$product->qty}}" >
                    </div>
                    <div class="col-md-2 col-2">
                        <br>

                        {{--                        <p>{{Cart::subtotal()}}</p>--}}
                    </div>
                </div>
            @endforeach
                <div class="row">
                    <div class="col-md-6 col-6">
                    </div>

                    <div class="col-md-6 col-6 und-line">
                        <div class="row">
                            <div class="col-md-4 col-4">
                                <p>@lang('lang.subtotal')</p>
                                <p>@lang('lang.shipping')<br></p>
                            </div>
                            <div class="col-md-4 col-20">
                                <p><br></p>
                            </div>
                            <div class="col-md-4 col-8">
                                <p>{{Cart::subtotal()}}</p>
                            </div>
                            <div class="col-md-4 col-8">
                                <p>{{Cart::tax()}}</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 col-6"></div>
                    <div class="col-md-6 col-6">
                        <div class="row half-line">
                            <div class="col-md-3 col-3"></div>
                            <div class="col-md-5 col-5"></div>
                            <div class="col-md-1 col-3">{{Cart::total()}}:SR</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-6"></div>
                    <div class="col-md-6 col-6 butt">
                        <a href=""><i class="fas fa-shopping-basket" ></i>@lang('lang.total')</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <br><br><br>

@endsection










