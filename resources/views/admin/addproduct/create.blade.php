@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
<section class="content">
    <div class="box box-default color-palette-box ">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('lang.AddProduct')</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/admin/addproduct')}}"  enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group col-lg-4">
                    <label  for="filter">@lang('lang.deptEn')</label>
                    <select id="filter" name="deptEn" class="form-control" style="height: 46px; width: 70%">
                        @foreach ($depts as $dept)
                            <option value="{{ $dept->id }}" >{{ $dept->titleEn }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label  for="filter">@lang('lang.deptAr')</label>
                    <select id="filter" name="deptAr" class="form-control" style="height: 46px; width: 70%">
                        @foreach ($depts as $dept)
                            <option value="{{ $dept->id }}" >{{ $dept->titleAr }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label  for="filter">@lang('lang.deptUr')</label>
                    <select id="filter" name="deptUr" class="form-control" style="height: 46px; width: 70%">
                        @foreach ($depts as $dept)
                            <option value="{{ $dept->id }}" >{{ $dept->titleUr}}</option>
                        @endforeach
                    </select>
                </div>

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
                <div class="form-group col-lg-4">
                </div>

                <div class="form-group col-lg-4 {{ $errors->has('name_en') ? ' has-error' : '' }}">
                    <label for="name_en">@lang('lang.name_en')</label>
                    <input type="text" id="name_en" name="nameEn" class="form-control" value="{!! old('name_en') !!}" style=" width: 70%"/>
                    <span class="help-block">{{ $errors->first('name_en', ':message') }}</span>
                </div>
                <div class="form-group col-lg-4 {{ $errors->has('name_ar') ? ' has-error' : '' }}">
                    <label for="name_ar">@lang('lang.name_ar')</label>
                    <input type="text" id="name_ar" name="nameAr" class="form-control" value="{!! old('name_ar') !!}" style=" width: 70%"/>
                    <span class="help-block">{{ $errors->first('name_ar', ':message') }}</span>
                </div>
                <div class="form-group col-lg-4 {{ $errors->has('name_ur') ? ' has-error' : '' }} ">
                    <label for="titleAr">@lang('lang.name_ur')</label>
                    <input type="text" id="name_ur" name="nameUr" class="form-control"  value="{!! old('name_ur') !!}" style=" width: 70%"/>
                    <span class="help-block">{{ $errors->first('name_ur', ':message') }}</span>
                </div>
                <div class="form-group  col-lg-2 {{ $errors->has('priceB') ? ' has-error' : '' }}">
                    <label for="price">@lang('lang.priceB')</label>
                    <input type="number" min="1" name="priceB" class="form-control" value="{!! old('price') !!}" style="height: 46px;width: 60%" />
                    <span class="input-group-addon" style="width: 50%">SR </span>
                    <span class="help-block">{{ $errors->first('price', ':message') }}</span>
                </div>
                <div class="form-group  col-lg-2 {{ $errors->has('priceA') ? ' has-error' : '' }}">
                    <label for="price">@lang('lang.priceA')</label>
                    <input type="number" min="1" name="priceA" class="form-control" value="{!! old('price') !!}" style="height: 46px;width: 60%"/>
                    <span class="input-group-addon" style="width: 50%">SR  </span>
                    <span class="help-block">{{ $errors->first('price', ':message') }}</span>
                </div>
                <div class="form-group col-lg-2 {{ $errors->has('stock') ? ' has-error' : '' }}">
                 <span style="font-weight: bold;  text-align: center; ">@lang('lang.stock')</span>
                <input type="number" name="stock" class="form-control" value="{!! old('stock') !!}" style="height: 46px; width: 70%;" />
                 <span class="help-block">{{ $errors->first('stock', ':message') }}</span>
             </div>
                <div class="form-group col-lg-2 {{ $errors->has('color') ? ' has-error' : '' }}">
                    <label for="titleEn">@lang('lang.color')</label>
                    <input  type="color" id="color" name="color" style="width: 50px; border-radius: 50%" class="form-control" value="{!! old('color') !!}" />
                    <span class="help-block">{{ $errors->first('color', ':message') }}</span>
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
                <div class="form-group col-lg-12 {{ $errors->has('info_en') ? ' has-error' : '' }}">
                    <label for="info_en">@lang('lang.info_en')</label>
                    <textarea type="body" rows="5" class="form-control"  name="infoEn"> </textarea>
                </div>
                <div class="form-group col-lg-12 {{ $errors->has('info_ur') ? ' has-error' : '' }}">
                    <label for="info_ur">@lang('lang.info_ur')</label>
                    <textarea type="body" rows="5" class="form-control"  name="infoUr"> </textarea>
                </div>
                <div class="form-group col-lg-2 {{ $errors->has('publish') ? ' has-error' : '' }}">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="publish" name="publish" checked >
                            @lang('lang.publish')
                        </label>
                    </div>
                </div>


                <hr>
                <div class="form-group center">
                            <div class="col-md-offset-2 col-md-4">
                                <a href="/admin/addproduct" class="btn btn-block btn-danger" role="button">@lang('lang.Cancel')</a>
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


