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
                @can(['view_NewOrder'])
                <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <br>
                        <p style="text-align: center; font-weight: bold; font-size: 30px">
                            @lang('lang.neworder')
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="/admin/shiporder" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
                @endcan
            <!-- ./col -->
                @can(['view_DelteOrder'])
                <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        {{--                        <h3>44</h3>--}}
                        <br>

                        <p style="text-align: center; font-weight: bold; font-size: 30px">
                            @lang('lang.deleteorders')
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="/admin/reject" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
                @endcan
            <!-- ./col -->
                @can('acceptNewOrder')
                <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <br>
                        <p style="text-align: center; font-weight: bold; font-size: 30px">
                            @lang('lang.acceptorders')
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="/admin/accept" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
                @endcan
            <!-- ./col -->
        </div>
    </section>
@endsection
