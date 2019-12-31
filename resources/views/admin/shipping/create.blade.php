@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box box-default color-palette-box ">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('lang.AddShipment')</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/admin/shipments')}}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body col-sm-6 col-sm-offset-1">

                        <div class="form-group col-lg-8 {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="client">@lang('lang.name')</label>
                            <input type="text" id="name" name="name" class="form-control" value="{!! old('name') !!}" style="height: 46px; " />
                            <span class="help-block">{{ $errors->first('name', ':message') }}</span>
                        </div>

                        <div class="form-group col-lg-8 {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone">@lang('lang.phone')</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="{!! old('phone') !!}" style="height: 46px; "/>
                            <span class="help-block">{{ $errors->first('phone', ':message') }}</span>
                        </div>

                        <div class="form-group col-lg-8 {{ $errors->has('proname') ? ' has-error' : '' }}">
                            <label for="product_num">Product Name</label>
                            <input type="text" id="product_num" name="proname" class="form-control" value="" style="height: 46px; " />
                            <span class="help-block">{{ $errors->first('proname', ':message') }}</span>
                        </div>

                        <div class="form-group col-lg-8 {{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount">@lang('lang.amount')</label>
                            <input type="number" id="amount" name="amount" class="form-control" value="{!! old('amount') !!}" style="height: 46px; " />
                            <span class="help-block">{{ $errors->first('amount', ':message') }}</span>
                        </div>

{{--                        <div class="form-group  col-lg-8 {{ $errors->has('color') ? ' has-error' : '' }}">--}}
{{--                            <label for="color">@lang('lang.color')</label>--}}
{{--                            <select id="color" name="color" class="form-control" style="height: 46px; ">--}}
{{--                                @foreach ($items as $color)--}}
{{--                                    <option value="{{ $color->id }}" >{{ $color->titleEn}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            <span class="help-block">{{ $errors->first('amount', ':message') }}</span>--}}

{{--                        </div>--}}



                        <hr>


                        <div class="form-group center">
                            <div class=" col-md-6">
                                <a href="/admin/shipments" class="btn btn-block btn-danger" role="button">@lang('lang.Cancel')</a>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-block btn-primary">@lang('lang.Add')</button>
                            </div>
                        </div>

                    </div>

            </form>
        </div>
        </div>
    </section>
@endsection
