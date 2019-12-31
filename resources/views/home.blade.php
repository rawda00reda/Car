@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


{{--@section('content')--}}
{{--    <div id="flash-msg">--}}
{{--        @include('flash::message')--}}
{{--    </div>--}}
{{--    @include('messages')--}}
{{--    <br>--}}
{{--    <h1 style="text-align: center">@lang('lang.Suppliers')</h1>--}}
{{--    <br>--}}
{{--    <section class="content">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-3 col-xs-6">--}}
{{--                <!-- small box -->--}}
{{--                <div class="small-box bg-aqua">--}}
{{--                    <div class="inner">--}}
{{--                          <br>--}}
{{--                        <p style="text-align: center; font-weight: bold; font-size: 30px">@lang('lang.PD')</p>--}}
{{--                    </div>--}}
{{--                    <div class="icon">--}}
{{--                        <i class="ion ion-bag"></i>--}}
{{--                    </div>--}}
{{--                    <a href="admin/supplier/{{Auth::user()->id}}/edit" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- ./col -->--}}
{{--            <div class="col-lg-3 col-xs-6">--}}
{{--                <!-- small box -->--}}
{{--                <div class="small-box bg-green">--}}
{{--                    <div class="inner">--}}
{{--                        <h3>53<sup style="font-size: 20px">%</sup></h3>--}}
{{--<br>--}}
{{--                        <p style="text-align: center; font-weight: bold; font-size: 30px">@lang('lang.products')</p>--}}
{{--                    </div>--}}
{{--                    <div class="icon">--}}
{{--                        <i class="ion ion-stats-bars"></i>--}}
{{--                    </div>--}}
{{--                    <a href="admin/addproduct" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- ./col -->--}}
{{--            <div class="col-lg-3 col-xs-6">--}}
{{--                <!-- small box -->--}}
{{--                <div class="small-box bg-yellow">--}}
{{--                    <div class="inner">--}}
{{--                        <h3>44</h3>--}}
{{--                        <br>--}}

{{--                        <p style="text-align: center; font-weight: bold; font-size: 30px">--}}
{{--                            @lang('lang.orders')--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <div class="icon">--}}
{{--                        <i class="ion ion-person-add"></i>--}}
{{--                    </div>--}}
{{--                    <a href="admin/shipments" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- ./col -->--}}
{{--            <div class="col-lg-3 col-xs-6">--}}
{{--                <!-- small box -->--}}
{{--                <div class="small-box bg-red">--}}
{{--                    <div class="inner">--}}
{{--                        <h3>65</h3>--}}
{{--                        <br>--}}
{{--                        <p style="text-align: center; font-weight: bold; font-size: 30px">--}}
{{--                            @lang('lang.Shipping')--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <div class="icon">--}}
{{--                        <i class="ion ion-pie-graph"></i>--}}
{{--                    </div>--}}
{{--                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- ./col -->--}}
{{--        </div>--}}
{{--    </section>--}}
{{--@endsection--}}
