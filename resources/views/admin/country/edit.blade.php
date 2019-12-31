@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box box-default color-palette-box ">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('lang.updatecountry')</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <form method="POST"  action="{{action('CountryController@update', $country->id)}}" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PATCH">
                    {{ csrf_field() }}

                    @csrf
                    <div class="box-body col-md-10 col-sm-offset-1">

                        <div class="form-group {{ $errors->has('countryAr') ? ' has-error' : '' }}">
                            <label for="countryAr">@lang('lang.countryAr')</label>
                            <input type="text" id="country_ar" name="countryAr" class="form-control"  value="{{$country->countryAr}}" />
                            <span class="help-block">{{ $errors->first('countryAr', ':message') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('countryEn') ? ' has-error' : '' }}">
                            <label for="countryEn">@lang('lang.countryEn')</label>
                            <input type="text" id="myname_en" name="countryEn" class="form-control" value="{{$country->countryEn}}" />
                            <span class="help-block">{{ $errors->first('countryEn', ':message') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('countryUr') ? ' has-error' : '' }}">
                            <label for="countryEn">@lang('lang.countryUr')</label>
                            <input type="text" id="myname_en" name="countryUr" class="form-control" value="{{$country->countryUr}}" />
                            <span class="help-block">{{ $errors->first('countryUr', ':message') }}</span>
                        </div>

                    </div>

                    <hr>

                    <div class="form-group center">
                        <div class="col-md-offset-2 col-md-4">
                            <a href="/admin/country" class="btn btn-block btn-danger" role="button">@lang('lang.Cancel')</a>
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
