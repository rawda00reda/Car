@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
<section class="content">
    <div class="box box-default color-palette-box ">
        <div class="box-header with-border">
            <h3 class="box-title"> @lang('lang.Add') @lang('lang.car')</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/admin/addcar')}}"  enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group col-lg-4">
                    <label  for="filter">@lang('lang.brandEn')</label>
                    <select id="filter" name="brandEn" class="form-control" style="height: 46px; width: 70%">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" >{{ $brand->titleEn }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label  for="filter">@lang('lang.brandAr')</label>
                    <select id="filter" name="brandAr" class="form-control" style="height: 46px; width: 70%">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" >{{ $brand->titleAr }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label  for="filter">@lang('lang.brandUr')</label>
                    <select id="filter" name="brandUr" class="form-control" style="height: 46px; width: 70%">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" >{{ $brand->titleUr }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label  for="filter">@lang('lang.carmodelEn')</label>
                    <select id="filter" name="modelEn" class="form-control" style="height: 46px; width: 70%">
                        @foreach ($models as $model)
                            <option value="{{ $model->id }}" >{{ $model->titleEn }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label  for="filter">@lang('lang.carmodelAr')</label>
                    <select id="filter" name="modelAr" class="form-control" style="height: 46px; width: 70%">
                        @foreach ($models as $model)
                            <option value="{{ $model->id }}" >{{ $model->titleAr }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label  for="filter">@lang('lang.carmodelUr')</label>
                    <select id="filter" name="modelUr" class="form-control" style="height: 46px; width: 70%">
                        @foreach ($models as $model)
                            <option value="{{ $model->id }}" >{{ $model->titleUr}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label  for="filter">CC</label>
                    <select id="filter" name="cc" class="form-control" style="height: 46px; width: 70%">
                        @foreach ($ccs as $cc)
                            <option value="{{ $cc->id }}" >{{ $cc->cc }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label  for="filter">@lang('lang.date')</label>
                    <select id="filter" name="prodate" class="form-control" style="height: 46px; width: 70%">
                        @foreach ($prodates as $prodate)
                            <option value="{{ $prodate->id }}" >{{ $prodate->date }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4  {{ $errors->has('images') ? ' has-error' : '' }}">
                <label for="images">@lang('lang.Image')</label>
                 <input type="file" name="img" multiple class="form-control-file" id="images" aria-describedby="fileHelp" >
                 <span class="help-block">{{ $errors->first('images', ':message') }}</span>
             </div>
                <div class="form-group col-lg-12 {{ $errors->has('info_ar') ? ' has-error' : '' }}">
                    <label for="bodyAr">@lang('lang.info_ar')</label>
                    <textarea type="body" rows="5" class="form-control"  name="infoAr"> </textarea>
                </div>
                <div class="form-group  {{ $errors->has('info_en') ? ' has-error' : '' }}">
                    <label for="info_en">@lang('lang.info_en')</label>
                    <textarea type="body" rows="5" class="form-control"  name="infoEn"> </textarea>
                </div>
                <div class="form-group  {{ $errors->has('info_ur') ? ' has-error' : '' }}">
                    <label for="info_ur">@lang('lang.info_ur')</label>
                    <textarea type="body" rows="5" class="form-control"  name="infoUr"> </textarea>
                </div>
                <hr>
                <div class="form-group center">
                            <div class="col-md-offset-2 col-md-4">
                                <a href="/admin/addcar" class="btn btn-block btn-danger" role="button">@lang('lang.Cancel')</a>
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


