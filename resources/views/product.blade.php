@extends('app')
@section('content')
    <br><br><br><br><br>

    <div class="container product-ambulance">
        <div class="row">
         @foreach($prodinfos as $prodinfo)

            <div class="col-md-6">
                <div class="imgBx">
                    <img src="{{asset('images/products/'.$prodinfo->img)}}" style="width: 475px;
    height: 400px;"> </div>
            </div>
            <div class="col-md-6">
                <div class="content">
                    @if ( app()->getLocale() == 'en')
                    <h2>{{$prodinfo->proEn}} <br> <span class="text-danger"></span></h2>
                    @elseif ( app()->getLocale() == 'ar')
                        <h2>{{$prodinfo->proAr}} <br> <span class="text-danger"></span></h2>
                    @else
                        <h2>{{$prodinfo->proUr}} <br> <span class="text-danger"></span></h2>
                    @endif

                        <hr>
                    <h5>@lang('lang.desc') :</h5>
                        @if ( app()->getLocale() == 'en')
                            <p>{{$prodinfo->infoEn}} </p>
                        @elseif ( app()->getLocale() == 'ar')
                            <p>{{$prodinfo->infoAr}} </p>
                        @else
                            <p>{{$prodinfo->infoUr}} </p>
                        @endif
                        <p></p>
                    <hr>
                        <form method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/cart')}}"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                    <div class="price">
                        @if ( app()->getLocale() == 'ar' | app()->getLocale() == 'ur')
                            <h5> :اللون</h5>
                            <div class="form-group has-feedback {{ $errors->has('color') ? ' has-error' : '' }}" style="    margin-bottom: -12px;">
                    <span style="display: inline-block; background-color: {{$prodinfo->color}}; width: 20px; height: 20px; border-radius: 50%; cursor: pointer; margin-right: 10px;" >
                        <input required type="radio" name="color" value="{{$prodinfo->color}}" style=" margin-left: -2px;    margin-top: 27px;       margin-right: 2px !important;  width: 25px;" >
                    </span>
                                @foreach($infos as $info)
                                    <span style="display: inline-block; background-color: {{$info->color}}; width: 20px; height: 20px; border-radius: 50%; cursor: pointer; margin-right: 10px;" >
                        <input type="radio" required name="color" value="{{$info->color}}" style=" margin-left: -2px;   margin-right: 20px; margin-top: 27px;    margin-right: 2px !important;   width: 25px;" >
                         </span>
                                @endforeach
                                @if ($errors->has('color'))
                                    <span class="help-block ">
                              <strong>{{ $errors->first('color') }}</strong>
                            </span>
                                @endif
                            </div><br>
                        @endif
                        @if ( app()->getLocale() == 'en')
                            <h5>Color :</h5>
                            <div class="form-group has-feedback {{ $errors->has('color') ? ' has-error' : '' }}" style="    margin-bottom: -12px;">
                    <span style="display: inline-block; background-color: {{$prodinfo->color}}; width: 20px; height: 20px; border-radius: 50%; cursor: pointer; margin-right: 10px;" >
                        <input required type="radio" name="color" value="{{$prodinfo->color}}" style=" margin-left: -2px;   margin-right: 20px; margin-top: 27px;     width: 25px;" >
                    </span>
                                @foreach($infos as $info)
                                    <span style="display: inline-block; background-color: {{$info->color}}; width: 20px; height: 20px; border-radius: 50%; cursor: pointer; margin-right: 10px;" >
                        <input type="radio" required name="color" value="{{$info->color}}" style=" margin-left: -2px;   margin-right: 20px; margin-top: 27px;     width: 25px;" >
                         </span>
                                @endforeach
                                @if ($errors->has('color'))
                                    <span class="help-block ">
                              <strong>{{ $errors->first('color') }}</strong>
                            </span>
                                @endif
                            </div><br>
                        @endif
                    </div>
                    <hr>
                        <div class="quan-cart has-feedback {{ $errors->has('qty') ? ' has-error' : '' }}">
                            <span class="quan"><span>@lang('lang.Quantity'):</span> <input type="number" min="1" required name="qty"> </span>
                            @if ($errors->has('qty'))
                                <span class="help-block ">
                             <strong>{{ $errors->first('qty') }}</strong>
                            </span>
                            @endif
                        </div><br>
                        <input type="hidden" name="id" value="{{$prodinfo->id}}">
                        <input type="hidden" name="priceA" value="{{$prodinfo->priceA}}">
                        <input type="hidden" name="priceB" value="{{$prodinfo->priceB}}">
                        <input type="hidden" name="name" value="{{$prodinfo->proEn}}">
                        <input type="hidden" name="img" value="{{$prodinfo->img}}">
                        <input type="hidden" name="companyName" value="{{$prodinfo->companyName}}">
                        <button type="submit" class="btn btn-warning" >@lang('lang.AddToCart')</button>
                        </form>

                    </div>
                </div>
            </div>
             @endforeach
        </div>
    <br><br><br>
{{--    <section class="single-product">--}}
{{--        <div class="container">--}}
{{--                    @foreach($prodinfos as $prodinfo)--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-5">--}}
{{--                    <img src="{{asset('images/products/'.$prodinfo->img)}}" width="100%" alt="">--}}
{{--                </div>--}}

{{--                <div class="col-md-7">--}}
{{--                    <p class="new-arrival text-center">@lang('lang.new')</p>--}}
{{--                    @if ( app()->getLocale() == 'en')--}}
{{--                    <h2>{{$prodinfo->proEn}}</h2>--}}
{{--                    @elseif ( app()->getLocale() == 'ar')--}}
{{--                        <h2>{{$prodinfo->proAr}}</h2>--}}
{{--                    @else--}}
{{--                        <h2>{{$prodinfo->proUr}}</h2>--}}
{{--                    @endif--}}
{{--                        <p>Product Code: {{$prodinfo->id}}</p>--}}
{{--                    <i class="fa fa-star"></i>--}}
{{--                    <i class="fas fa-star-half-alt"></i>--}}
{{--                    <i class="fa fa-star"></i>--}}
{{--                    <i class="fa fa-star"></i>--}}
{{--                    <i class="fa fa-star"></i>--}}
{{--                    <br><span class="priceun">{{$prodinfo->priceB}}SR</span>--}}
{{--                    <p class="price">{{$prodinfo->priceA}}SR</p>--}}
{{--                    <hr>--}}
{{--                    <form method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/cart')}}"  enctype="multipart/form-data">--}}
{{--                        {{ csrf_field() }}--}}
{{--                        @if ( app()->getLocale() == 'ar' | app()->getLocale() == 'ur')--}}
{{--                        <h5> :اللون</h5>--}}
{{--                        <div class="form-group has-feedback {{ $errors->has('color') ? ' has-error' : '' }}" style="    margin-bottom: -12px;">--}}
{{--                    <span style="display: inline-block; background-color: {{$prodinfo->color}}; width: 20px; height: 20px; border-radius: 50%; cursor: pointer; margin-right: 10px;" >--}}
{{--                        <input required type="radio" name="color" value="{{$prodinfo->color}}" style=" margin-left: -2px;    margin-top: 27px;     width: 25px;" >--}}
{{--                    </span>--}}
{{--                            @foreach($infos as $info)--}}
{{--                                <span style="display: inline-block; background-color: {{$info->color}}; width: 20px; height: 20px; border-radius: 50%; cursor: pointer; margin-right: 10px;" >--}}
{{--                        <input type="radio" required name="color" value="{{$info->color}}" style=" margin-left: -2px;   margin-right: 20px; margin-top: 27px;     width: 25px;" >--}}
{{--                         </span>--}}
{{--                            @endforeach--}}
{{--                            @if ($errors->has('color'))--}}
{{--                                <span class="help-block ">--}}
{{--                              <strong>{{ $errors->first('color') }}</strong>--}}
{{--                            </span>--}}
{{--                            @endif--}}
{{--                        </div><br>--}}
{{--                        @endif--}}
{{--                        @if ( app()->getLocale() == 'en')--}}
{{--                        <h5>Color :</h5>--}}
{{--                        <div class="form-group has-feedback {{ $errors->has('color') ? ' has-error' : '' }}" style="    margin-bottom: -12px;">--}}
{{--                    <span style="display: inline-block; background-color: {{$prodinfo->color}}; width: 20px; height: 20px; border-radius: 50%; cursor: pointer; margin-right: 10px;" >--}}
{{--                        <input required type="radio" name="color" value="{{$prodinfo->color}}" style=" margin-left: -2px;   margin-right: 20px; margin-top: 27px;     width: 25px;" >--}}
{{--                    </span>--}}
{{--                            @foreach($infos as $info)--}}
{{--                                <span style="display: inline-block; background-color: {{$info->color}}; width: 20px; height: 20px; border-radius: 50%; cursor: pointer; margin-right: 10px;" >--}}
{{--                        <input type="radio" required name="color" value="{{$info->color}}" style=" margin-left: -2px;   margin-right: 20px; margin-top: 27px;     width: 25px;" >--}}
{{--                         </span>--}}
{{--                            @endforeach--}}
{{--                            @if ($errors->has('color'))--}}
{{--                                <span class="help-block ">--}}
{{--                              <strong>{{ $errors->first('color') }}</strong>--}}
{{--                            </span>--}}
{{--                            @endif--}}
{{--                        </div><br>--}}
{{--                        @endif--}}
{{--                        <p><b>Availability:</b> In Stock</p>--}}
{{--                    <p><b>Condition:</b> New</p>--}}
{{--                    <p><b>Brand:</b> XYZ company</p>--}}
{{--                        <div class="form-group has-feedback {{ $errors->has('qty') ? ' has-error' : '' }}">--}}
{{--                            <label>@lang('lang.Quantity'):</label>--}}
{{--                            <input type="number" min="1" required name="qty" value="" style="width: 100px;">--}}
{{--                            @if ($errors->has('qty'))--}}
{{--                                <span class="help-block ">--}}
{{--                             <strong>{{ $errors->first('qty') }}</strong>--}}
{{--                            </span>--}}
{{--                            @endif--}}
{{--                        </div><br>--}}


{{--                        <input type="hidden" name="id" value="{{$prodinfo->id}}">--}}
{{--                        <input type="hidden" name="priceA" value="{{$prodinfo->priceA}}">--}}
{{--                        <input type="hidden" name="priceB" value="{{$prodinfo->priceB}}">--}}
{{--                        <input type="hidden" name="name" value="{{$prodinfo->proEn}}">--}}
{{--                        <input type="hidden" name="img" value="{{$prodinfo->img}}">--}}
{{--                        <input type="hidden" name="companyName" value="{{$prodinfo->companyName}}">--}}

{{--                        <button type="submit" class="btn btn-primary" >@lang('lang.AddToCart')</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--                        @endforeach--}}
{{--        </div>--}}
{{--    </section>--}}



@endsection


