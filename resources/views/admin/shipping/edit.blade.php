@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box box-default color-palette-box ">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('lang.updateShipment')</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <form method="POST"  action="{{action('ShipController@update', $ship->id)}}" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PATCH">
                    {{ csrf_field() }}

                    @csrf
                    <div class="box-body col-sm-4 col-sm-offset-1">

{{--                        <div class="form-group {{ $errors->has('Ship_num') ? ' has-error' : '' }}">--}}
{{--                            <label for="Ship_num">@lang('lang.Ship_num')</label>--}}
{{--                            <input type="text" id="Ship_num" name="Ship_num" class="form-control"  value="{{$ship->Ship_num}}" />--}}
{{--                            <span class="help-block">{{ $errors->first('Ship_num', ':message') }}</span>--}}
{{--                        </div>--}}
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="client">@lang('lang.name')</label>
                            <input type="text" id="client" name="name" class="form-control" value="{{$ship->user_name	}}" />
                            <span class="help-block">{{ $errors->first('name', ':message') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone">@lang('lang.phone')</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="{{$ship->phone}}" />
                            <span class="help-block">{{ $errors->first('phone', ':message') }}</span>
                        </div>

                        <div class="form-group  {{ $errors->has('proname') ? ' has-error' : '' }}">
                            <label for="product_num">Product Name</label>
                            <input type="text" id="product_num" name="proname" class="form-control" value="{{$ship->product_name	}}" style="height: 46px; " />
                            <span class="help-block">{{ $errors->first('proname', ':message') }}</span>
                        </div>

{{--                        <div class="form-group {{ $errors->has('product_num') ? ' has-error' : '' }}">--}}
{{--                            <label for="product_num">@lang('lang.product_num')</label>--}}
{{--                            <input type="text" id="product_num" name="product_num" class="form-control" value="{{$ship->product_num}}" />--}}
{{--                            <span class="help-block">{{ $errors->first('product_num', ':message') }}</span>--}}
{{--                        </div>--}}


                        <div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount">@lang('lang.amount')</label>
                            <input type="number" id="amount" name="amount" class="form-control" value="{{$ship->amount}}" />
                            <span class="help-block">{{ $errors->first('amount', ':message') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('color') ? ' has-error' : '' }}">
                            <label for="color">@lang('lang.color')</label>
                            <select id="color" name="color" class="form-control" style="height: 46px;">
                                @foreach ($colors as $color)
                                    <option {{ $ship->color == "$color->id" ? "selected" : "" }} value="{{ $color->id }}" >{{ $color->titleEn}}</option>
                                @endforeach
                            </select>
                            <span class="help-block">{{ $errors->first('amount', ':message') }}</span>

                        </div>



{{--                        <div class="form-group {{ $errors->has('confirm') ? ' has-error' : '' }}">--}}
{{--                            <label for="confirm">@lang('lang.confirm')</label> <br>--}}
{{--                            <input type="radio" name="confirm" {{$ship->confirm == "Confirmed" ? "checked" : ""}} value="@lang('lang.yConfirm')" >@lang('lang.yConfirm')<br>--}}
{{--                            <input type="radio" name="confirm" {{$ship->confirm == "Not Confirmed" ? "checked" : ""}} value="@lang('lang.nConfirm')">@lang('lang.nConfirm')<br>--}}
{{--                            <span class="help-block">{{ $errors->first('confirm', ':message') }}</span>--}}
{{--                        </div>--}}

{{--                        <div class="form-group {{ $errors->has('shipping') ? ' has-error' : '' }}">--}}
{{--                            <label for="shipping">@lang('lang.shipping')</label> <br>--}}
{{--                            <input type="radio" name="shipping" {{$ship->shipping == "Done" ? "checked" : ""}} value="@lang('lang.yShipping')"> Done <br>--}}
{{--                            <input type="radio" name="shipping" {{$ship->shipping == "Not Yet" ? "checked" : ""}} value="@lang('lang.nShipping')">Not yet<br>--}}
{{--                            <span class="help-block">{{ $errors->first('shipping', ':message') }}</span>--}}
{{--                        </div>--}}

{{--                        <div class="form-group {{ $errors->has('eval') ? ' has-error' : '' }}">--}}
{{--                            <label for="eval">@lang('lang.eval')</label> <br>--}}
{{--                            <input type="radio" name="eval" {{$ship->eval == "Excellent" ? "checked" : ""}} value="@lang('lang.eEval')" >Excellent<br>--}}
{{--                            <input type="radio" name="eval" {{$ship->eval == "Good" ? "checked" : ""}} value="@lang('lang.gEval')"> Good<br>--}}
{{--                            <input type="radio" name="eval" {{$ship->eval == "Bad" ? "checked" : ""}} value="@lang('lang.bEval')"> Bad)<br>--}}

{{--                            <span class="help-block">{{ $errors->first('shipping', ':message') }}</span>--}}
{{--                        </div>--}}
{{--                        <div class="form-group {{ $errors->has('notes') ? ' has-error' : '' }}">--}}
{{--                            <label for="notes">@lang('lang.notes')</label><br>--}}
{{--                            <textarea name="notes" style="width:200px;">{{ $ship->notes }}</textarea>--}}
{{--                            <span class="help-block">{{ $errors->first('notes', ':message') }}</span>--}}
{{--                        </div>--}}



                        <hr>

                    <div class="form-group center">
                        <div class="col-md-offset-2 col-md-4">
                            <a href="/admin/shipments" class="btn btn-block btn-danger" role="button">@lang('lang.Cancel')</a>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-block btn-primary">@lang('lang.update')</button>
                        </div>
                    </div>

            </form>
        </div>
        </div>
    </section>
@endsection
