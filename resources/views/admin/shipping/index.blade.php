@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
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
                            <th style="">@lang('lang.ordernumber')</th>
                            <th style="">@lang('lang.clientname')</th>
                            <th style="">@lang('lang.phone')</th>
                            <th style="">@lang('lang.productid')</th>
                            <th style="">@lang('lang.suppliername')</th>
                            <th style="">@lang('lang.date')</th>
                            <th style="">@lang('lang.subtotal')</th>
                            <th style="">@lang('lang.total')</th>
                            <th style=""></th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        @foreach($shipments as $ship)--}}
{{--                            <tr>--}}
{{--                                <td>{{ $ship->id }}</td>--}}
{{--                                <td>{{ $ship->user_name}}</td>--}}
{{--                                <td>{{ $ship->phone}}</td>--}}
{{--                                <td>{{ $ship->product_name}}</td>--}}
{{--                                <td>{{ $ship->amount}}</td>--}}
{{--                                <th>  <input type="color" id="color" name="color" style="width: 100px;" class="form-control" value="{{$ship->color}}" />--}}
{{--                                <th>{{$ship->shipping}}</th>--}}
{{--                                <td>--}}
{{--                                    <a href="userdate/{{ $ship->id}}" type="button" class="btn btn-info">@lang('lang.UserDetails')</a>--}}
{{--                                    <a href="productdata/{{ $ship->product_id}}" type="button" class="btn btn-info">@lang('lang.ProductDetails')</a>--}}
{{--                                    <a href="orderdetails/{{ $ship->id}}" type="button" class="btn btn-info">@lang('lang.ordertDetails')</a>--}}
{{--                                    <a class="btn">--}}
{{--                                        <form action="{{action('ShipController@destroy', $ship->id)}}" method="post">--}}
{{--                                            {{csrf_field()}}--}}
{{--                                            <input name="_method" type="hidden" value="DELETE">--}}
{{--                                            <button  type="submit" class="btn btn-danger">@lang('lang.Delete')</button >--}}
{{--                                            @csrf--}}
{{--                                        </form>--}}
{{--                                    </a>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
                        </tbody>
                    </table>


                    <div class="box-footer clearfix">
                    <div class="box-footer clearfix">
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
