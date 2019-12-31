@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box box-default color-palette-box ">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('lang.updatecity')</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <form method="POST"  action="{{action('CityController@update', $city->id)}}" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PATCH">
                    {{ csrf_field() }}

                    @csrf
                    <div class="box-body col-md-10 col-sm-offset-1">

                        <div class="form-group {{ $errors->has('cityAr') ? ' has-error' : '' }}">
                            <label for="cityAr">@lang('lang.cityAr')</label>
                            <input type="text" id="cityAr" name="cityAr" class="form-control"  value="{{$city->cityAr}}" />
                            <span class="help-block">{{ $errors->first('cityAr', ':message') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cityEn') ? ' has-error' : '' }}">
                            <label for="cityEn">@lang('lang.cityEn')</label>
                            <input type="text" id="myname_en" name="cityEn" class="form-control" value="{{$city->cityEn}}" />
                            <span class="help-block">{{ $errors->first('cityEn', ':message') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cityUr') ? ' has-error' : '' }}">
                            <label for="cityEn">@lang('lang.cityUr')</label>
                            <input type="text" id="myname_en" name="cityUr" class="form-control" value="{{$city->cityUr}}" />
                            <span class="help-block">{{ $errors->first('cityUr', ':message') }}</span>
                        </div>

                    </div>

                    <hr>

                    <div class="form-group center">
                        <div class="col-md-offset-2 col-md-4">
                            <a href="/admin/city" class="btn btn-block btn-danger" role="button">@lang('lang.Cancel')</a>
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
