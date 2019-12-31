@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box-default color-palette-box">
            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered text-center">
                        <tbody>
                        <tr>
                            <th style="width: 5%">@lang('lang.ID')</th>
                            <th style="width: 15%">@lang('lang.Ship_num')</th>
                            <th style="width: 15%">@lang('lang.phone')</th>
                            <th style="width: 15%">@lang('lang.product_num')</th>
                            <th style="width: 15%">@lang('lang.amount')</th>
                            <th style="width: 15%">@lang('lang.color')</th>
                            <th style="width: 15%">@lang('lang.confirm')</th>
                            <th style="width: 15%">@lang('lang.shipping')</th>
                            <th style="width: 15%">@lang('lang.notes')</th>
                            <th style="width: 15%">@lang('lang.eval')</th>
                            <th style="width: 20%"></th>
                        </tr>


                        @foreach($shipments as $ship)
                            <tr>
                                <td>{{ $ship->Ship_num }}</td>
                                <td>{{ $ship->phone}}</td>
                                <td>{{ $ship->product_num}}</td>
                                <td>{{ $ship->amount}}</td>
                                <td>{{ $ship->color}}</td>
                                <td>{{ $ship->confirm}}</td>
                                <td>{{ $ship->shipping}}</td>
                                <td>{{ $ship->notes}}</td>
                                <td>{{ $ship->eval}}</td>



                            </tr>
                        @endforeach



                        </tbody>
                    </table>

                    </div>

                </div>
            </div>
    </section>
@endsection



