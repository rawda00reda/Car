@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box box-default color-palette-box ">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('lang.city')</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/admin/city')}}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group col-lg-6">
                        <label  for="filter">@lang('lang.country')</label>
                        <select id="filter" name="country_id" class="form-control" style="height: 46px; width: 70%">
                            @foreach ($country as $coun)
                                @if ( app()->getLocale() == 'ar' )
                                    <option value="{{ $coun->id }}" >{{ $coun->countryAr }}</option>
                                @elseif ( app()->getLocale() == 'en' )
                                    <option value="{{ $coun->id }}" >{{ $coun->countryEn }}</option>
                                @else
                                    <option value="{{ $coun->id }}" >{{ $coun->countryUr }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-6">

                    </div>

                    <div class="form-group col-lg-7 {{ $errors->has('cityAr') ? ' has-error' : '' }}">
                        <label for="cityAr">@lang('lang.cityAr')</label>
                        <input type="text" id="cityAr" name="cityAr" class="form-control" value="{!! old('cityAr') !!}" />
                        <span class="help-block">{{ $errors->first('cityAr', ':message') }}</span>
                    </div>

                    <div class="form-group  col-lg-7{{ $errors->has('cityEn') ? ' has-error' : '' }}">
                        <label for="cityEn">@lang('lang.cityEn')</label>
                        <input type="text" id="cityEn" name="cityEn" class="form-control" value="{!! old('cityEn') !!}" />
                        <span class="help-block">{{ $errors->first('cityEn', ':message') }}</span>
                    </div>
                    <div class="form-group  col-lg-7{{ $errors->has('cityUr') ? ' has-error' : '' }}">
                        <label for="cityUr">@lang('lang.cityUr')</label>
                        <input type="text" id="cityUr" name="cityUr" class="form-control" value="{!! old('cityUr') !!}" />
                        <span class="help-block">{{ $errors->first('cityUr', ':message') }}</span>
                    </div>


        <hr>

                    <div class="form-group center">
                        <div class="col-md-offset-2 col-md-4">
                            <a href="/admin/city" class="btn btn-block btn-danger" role="button">@lang('lang.Cancel')</a>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-block btn-primary">@lang('lang.Add')</button>
                        </div>
                    </div>
            </form>
        </div>
        </div>
    </section>
@endsection
