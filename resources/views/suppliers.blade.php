@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <div id="flash-msg">
        @include('flash::message')
    </div>
    @include('messages')
    <br>
    <br>
{{--    @can(['view_supplier'])--}}
        <section class="content">
        <div class="row">
                @can(['view_personalData'])
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                          <br>
                        <p style="text-align: center; font-weight: bold; font-size: 30px">@lang('lang.PD')</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="supplier/{{Auth::user()->id}}/edit" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            @endcan
            <!-- ./col -->
                    @can(['view_product'])
                    <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
{{--                        <h3>53<sup style="font-size: 20px">%</sup></h3>--}}
<br>
                        <p style="text-align: center; font-weight: bold; font-size: 30px">@lang('lang.products')</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="/admin/addproduct" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
                    @endcan
            <!-- ./col -->
                    @can(['view_NewOrder'])
                    <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
{{--                        <h3>44</h3>--}}
                        <br>
                        <p style="text-align: center; font-weight: bold; font-size: 30px">
                            @lang('lang.neworders')
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="/admin/shipments" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
                @endcan
            <!-- ./col -->
                    @can(['view_DelteOrder'])
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
{{--                        <h3>65</h3>--}}
                        <br>
                        <p style="text-align: center; font-weight: bold; font-size: 30px">
                            @lang('lang.deleteorders')
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="/admin/deleteorders" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
                    @endcan
                    @can(['view_TransferOrders'])
                    <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-fuchsia">
                    <div class="inner">
                        {{--                        <h3>44</h3>--}}
                        <br>

                        <p style="text-align: center; font-weight: bold; font-size: 30px">
                            @lang('lang.trasferorders')
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="/admin/transferorders" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
                @endcan
                    @can(['view_TransferOrders'])
                    <div class="col-lg-4 col-xs-6">
                    @endcan

                    <!-- small box -->
                        @can('acceptNewOrder')
                <div class="small-box bg-olive">
                    <div class="inner">
                        {{--                        <h3>44</h3>--}}
                        <br>

                        <p style="text-align: center; font-weight: bold; font-size: 30px">
                            @lang('lang.acceptorders')
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="/admin/acceptorders" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                            @endcan
            </div>

            <!-- ./col -->
        </div>
    </section>
{{--    @endcan--}}

@endsection
