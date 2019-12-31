@extends('app')
@section('content')
    <!--**************************** SLIDER ************************** -->
    <div class="banner">
        <div class="txt-banner">
            <h1 class="wow fadeInDown">@lang('lang.bestdeal') !!</h1>
            <p class="wow fadeInLeft delay-1s">@lang('lang.trust')</p>
            <button class="btn btn-warning wow fadeInLeft delay-1s">
                <a href="https://www.google.com/maps/@30.6011189,31.4798942,15z" target="_blank">@lang('lang.FASTSERCIVES')</a>
            </button>
        </div>
    </div>
    <!--**************************** ICON ************************** -->
    <div class="icons">
        <ul>
            <a href="/cart" title="Shopping">
                <li class="pasket"> <i class="fas fa-shopping-cart"></i> </li>
            </a>
        </ul>
    </div>
    <!--**************************** boxex ************************** -->
    <div class="save">
        <div class="container">
            <div class="row">
                @foreach($services as $service)
                    @if ( app()->getLocale() == 'en')
                <div class="col-md-4">
                    <h3 class="text-center">{{$service->title_en}}</h3>
                    <div class="row">
                        <div class="col-md-3 col-3 text-center"><img src="{{asset('images/services/'.$service->img)}}" width="85%"></div>
                        <div class="col-md-9 col-9">
                            <p>{{$service->	body_en}}</p>
                        </div>
                    </div>
                </div>
                    @elseif ( app()->getLocale() == 'ar')
                        <div class="col-md-4">
                            <h3 class="text-center">{{$service->title_ar}}</h3>
                            <div class="row">
                                <div class="col-md-3 col-3 text-center"><img src="{{asset('images/services/'.$service->img)}}" width="85%"></div>
                                <div class="col-md-9 col-9">
                                    <p>{{$service->	body_ar}}</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-4">
                            <h3 class="text-center">{{$service->title_ur}}</h3>
                            <div class="row">
                                <div class="col-md-3 col-3 text-center"><img src="{{asset('images/services/'.$service->img)}}" width="85%"></div>
                                <div class="col-md-9 col-9">
                                    <p>{{$service->	body_ur}}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    @endforeach
            </div>
        </div>
    </div>
    <!--   ******************* Choose US side *****************-->
    <div class="choose-us">
        <div class="container">
            <div class="h1">
                @lang('lang.WHYCHOOSEUS')
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-4">
                    @foreach($welcom as $welco)
                        @if ( app()->getLocale() == 'en')
                        <h5>  {{$welco->title_en}}</h5>
                        <p>{{$welco->body_en}}</p><br><br>
                            @elseif ( app()->getLocale() == 'ar')
                                <h5>  {{$welco->title_ar}}</h5>
                                <p>{{$welco->body_ar}}</p><br><br>
                                 @else
                                    <h5>  {{$welco->title_ur}}</h5>
                                    <p>{{$welco->body_ur}}</p><br><br>
                        @endif
                            @endforeach

                </div>
                <div class="col-md-4 middle">
                    @foreach($welcome as $welcom)
                    <img src="{{asset('images/welcomes/'.$welcom->img)}}">
                        @endforeach
                </div>
                <div class="col-md-4">
                    @foreach($welcomes as $welcome)
                        @if ( app()->getLocale() == 'en')
                            <h5>  {{$welcome->title_en}}</h5>
                            <p>{{$welcome->body_en}}</p><br><br>
                        @elseif ( app()->getLocale() == 'ar')
                            <h5>  {{$welcome->title_ar}}</h5>
                            <p>{{$welcome->body_ar}}</p><br><br>
                        @else
                            <h5>  {{$welcome->title_ur}}</h5>
                            <p>{{$welcome->body_ur}}</p><br><br>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- ************************* on sale section **********************************-->
    @foreach($depts as $dept)
    <section class="on-sale">
        <div class="container">
            <div class="title-box">
                @if ( app()->getLocale() == 'en')
                <h2>{{$dept->titleEn}}</h2>
                    @elseif ( app()->getLocale() == 'ar')
                        <h2>{{$dept->titleAr}}</h2>
                    @else
                        <h2>{{$dept->titleUr}}</h2>
                    @endif
            </div>
            <div class="owl-carousel owl-theme">
                @foreach(App\Product::where('deptEn', $dept->id)->get() as $pro)
                        <div class="item">
                    <div class="product-top">
                        <a href="product/{{$pro->id}}">
                            <img src="{{asset('images/products/'.$pro->img)}}" style="    height: 250px !important;">
                            <p>
                            </p>
                        </a>
                        <div class="overlay-right">
                            <button type="button" class="btn btn-secondary" title="Quick Shop"></button>
                            <a href="product/{{$pro->id}}"><i class="fa fa-eye"></i></a>
                            <button type="button" class="btn btn-secondary" title="Add to wish list"></button>
                            <i class="far fa-heart"></i>
                            <button type="button" class="btn btn-secondary" title="Add to cart"></button>
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                    </div>
                    <div class="product-bottom text-center">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <h3><a href="product/{{$pro->id}}">{{$pro->priceA}}</a></h3>
                        <h5></h5>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    @endforeach

    <!-- ************************* on sale section **********************************-->

    <!-- ************************* on sale section **********************************-->

    <!-- ************************* on sale section **********************************-->
    <br>

@endsection
