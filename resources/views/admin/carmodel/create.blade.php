@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box box-default color-palette-box ">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('lang.Add') @lang('lang.CarModel')</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <form method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/admin/carmodel')}}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body col-md-8 col-sm-offset-1">
                        <div class="form-group col-lg-4">
                            <label  for="filter">@lang('lang.brand')</label>
                            <select id="filter" name="brand_id" class="form-control" style="height: 46px; width: 70%">
                                @foreach ($brands as $brand)
                                    @if ( app()->getLocale() == 'ar' )
                                        <option value="{{ $brand->id }}" >{{ $brand->titleAr }}</option>
                                    @elseif ( app()->getLocale() == 'en' )
                                        <option value="{{ $brand->id }}" >{{ $brand->titleEn }}</option>
                                    @else
                                        <option value="{{ $brand->id }}" >{{ $brand->titleEn }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-lg-12 {{ $errors->has('titleAr') ? ' has-error' : '' }}">
                            <label for="titleAr">@lang('lang.Add') @lang('lang.carmodelAr')  </label>
                            <input type="text" id="myname_ar" name="titleAr" class="form-control"  value="{!! old('titleAr') !!}" />
                            <span class="help-block">{{ $errors->first('titleAr', ':message') }}</span>
                        </div>
                        <div class="form-group col-lg-12 {{ $errors->has('titleEn') ? ' has-error' : '' }}">
                            <label for="titleAr">@lang('lang.Add') @lang('lang.carmodelEn') </label>
                            <input type="text" id="myname_ar" name="titleEn" class="form-control"  value="{!! old('titleEn') !!}" />
                            <span class="help-block">{{ $errors->first('titleEn', ':message') }}</span>
                        </div>
                        <div class="form-group col-lg-12 {{ $errors->has('titleUr') ? ' has-error' : '' }}">
                            <label for="titleAr">@lang('lang.Add') @lang('lang.carmodelUr') </label>
                            <input type="text" id="myname_ar" name="titleUr" class="form-control"  value="{!! old('titleUr') !!}" />
                            <span class="help-block">{{ $errors->first('titleUr', ':message') }}</span>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group center">
                        <div class="col-md-offset-2 col-md-4">
                            <a href="/admin/carmodel" class="btn btn-block btn-danger" role="button">@lang('lang.Cancel')</a>
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
