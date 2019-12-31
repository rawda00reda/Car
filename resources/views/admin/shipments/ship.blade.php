@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')

    <section class="content">
        <div id="flash-msg">
            @include('flash::message')
        </div>
        @include('messages')

        <div class="box-default color-palette-box">
            <div class="box">
{{--                <div class="box-header with-border">--}}
{{--                    <a href="/admin/shipments/create" type="button" class="btn btn-info pull-right">@lang('lang.AddShipment')</a>--}}
{{--                </div>--}}
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <th style="">@lang('lang.clientname')</th>
                            <th style="">@lang('lang.phone')</th>
                            <th style="">@lang('lang.suppliername')</th>
                            <th style="">@lang('lang.ordernumber')</th>
                            <th style="">@lang('lang.productid')</th>
                            <th style="">@lang('lang.total')</th>
                            <th style="">@lang('lang.subtotal')</th>
                            <th style="">@lang('lang.date')</th>
                            <th style=""></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($shipment as $ship)
                            <form method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/admin/shiporder/'.$ship->id)}}"  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @csrf
                            <tr>
                                <td>{{ $ship->user_name }}</td>
                                <td>{{ $ship->phone}}</td>
                                <td>{{ $ship->companyName}}</td>
                                <td>{{ $ship->id}}</td>
                                <td>{{ $ship->product_id}}</td>
                                <th>{{$ship->subtotal}}</th>
                                <th>{{$ship->total}}</th>
                                <th>{{$ship->created_at	}}</th>
                                <td>
                                    <a href="userdate/{{ $ship->id}}" type="button" class="btn btn-info">@lang('lang.UserDetails')</a>
                                    <a href="productdata/{{ $ship->product_id}}" type="button" class="btn btn-info">@lang('lang.ProductDetails')</a>
                                    <a href="/admin/shiporder/{{$ship->id}}" type="button" class="btn btn-info">@lang('lang.accept')</a>
                                    <a href="/admin/deleteorders/{{$ship->id}}" type="button" class="btn btn-danger">@lang('lang.delete')</a>
                                    <a class="btn">
                                    </a>
                                </td>
                            </tr>
                            </form>

                        @endforeach
                        </tbody>
                    </table>


                    <div class="box-footer clearfix">
                    <div class="box-footer clearfix">
                    </div>

                </div>
            </div>
            </div></div>
    </section>
@endsection
