@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
<section class="content">
    <div id="flash-msg">
        @include('flash::message')
    </div>
    @include('messages')
    <div class="box box-default color-palette-box ">
        <div class="box-header with-border">
            @lang('lang.Update') @lang('lang.product')
        </div>
            <!-- /.box-header -->
        <div class="box-body">
            <form method="POST"  action="{{action('AddProducts@update', $product->id)}}" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PATCH">
                {{ csrf_field() }}
                @csrf
                <div class="form-group col-lg-4">
                    <label  for="filter">@lang('lang.deptEn')</label>
                    <select id="filter" name="deptEn" class="form-control" style="height: 46px; width: 70%">
                        @foreach ($depts as $dept)
                            <option {{ $dept->id == "$product->deptEn" ? "selected" : "" }} value="{{ $dept->id }}" >{{ $dept->titleEn}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label  for="filter">@lang('lang.deptAr')</label>
                    <select id="filter" name="deptAr" class="form-control" style="height: 46px; width: 70%">
                        @foreach ($depts as $dept)
                            <option {{ $dept->id == "$product->deptAr" ? "selected" : "" }} value="{{ $dept->id }}" >{{ $dept->titleAr}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label  for="filter">@lang('lang.deptUr')</label>
                    <select id="filter" name="deptUr" class="form-control" style="height: 46px; width: 70%">
                        @foreach ($depts as $dept)
                            <option {{ $dept->id == "$product->deptUr" ? "selected" : "" }} value="{{ $dept->id }}" >{{ $dept->titleUr}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label  for="filter">@lang('lang.specialEn')</label>
                    <select id="filter" name="specialEn" class="form-control" style="height: 46px; width: 70%">
                        @foreach ($specials as $special)
                            <option {{ $special->id == "$product->deptUr" ? "selected" : "" }} value="{{ $special->id }}" >{{ $special->titleEn}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label  for="filter">@lang('lang.specialAr')</label>
                    <select id="filter" name="specialAr" class="form-control" style="height: 46px; width: 70%">
                        @foreach ($specials as $special)
                            <option {{ $special->id == "$product->deptUr" ? "selected" : "" }} value="{{ $special->id }}" >{{ $special->titleAr}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label  for="filter">@lang('lang.specialUr')</label>
                    <select id="filter" name="specialUr" class="form-control" style="height: 46px; width: 70%">
                        @foreach ($specials as $special)
                            <option {{ $special->id == "$product->deptUr" ? "selected" : "" }} value="{{ $special->id }}" >{{ $special->titleUr}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label  for="filter">@lang('lang.branchEn')</label>
                    <select id="filter" name="branchEn" class="form-control" style="height: 46px; width: 70%">
                        @foreach ($branchs as $branch)
                            <option {{ $branch->id == "$product->deptUr" ? "selected" : "" }} value="{{ $branch->id }}" >{{ $branch->titleEn}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label  for="filter">@lang('lang.branchAr')</label>
                    <select id="filter" name="branchAr" class="form-control" style="height: 46px; width: 70%">
                        @foreach ($branchs as $branch)
                            <option {{ $branch->id == "$product->deptUr" ? "selected" : "" }} value="{{ $branch->id }}" >{{ $branch->titleAr}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label  for="filter">@lang('lang.branchUr')</label>
                    <select id="filter" name="branchUr" class="form-control" style="height: 46px; width: 70%">
                        @foreach ($branchs as $branch)
                            <option {{ $branch->id == "$product->deptUr" ? "selected" : "" }} value="{{ $branch->id }}" >{{ $branch->titleUr}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4 {{ $errors->has('name_en') ? ' has-error' : '' }}">
                    <label for="name_en">@lang('lang.name_en')</label>
                    <input type="text" id="name_en" name="nameEn" class="form-control" value="{{$product->proEn }}" />
                    <span class="help-block">{{ $errors->first('name_en', ':message') }}</span>
                </div>
                <div class="form-group col-lg-4 {{ $errors->has('name_ar') ? ' has-error' : '' }}">
                    <label for="name_ar">@lang('lang.name_ar')</label>
                    <input type="text" id="name_ar" name="nameAr" class="form-control" value="{{$product->proAr }}" />
                    <span class="help-block">{{ $errors->first('name_ar', ':message') }}</span>
                </div>
                <div class="form-group col-lg-4 {{ $errors->has('name_ur') ? ' has-error' : '' }} ">
                    <label for="titleAr">@lang('lang.name_ur')</label>
                    <input type="text" id="name_ur" name="nameUr" class="form-control"  value="{{$product->proUr }}" />
                    <span class="help-block">{{ $errors->first('name_ur', ':message') }}</span>
                </div>
                <div class="form-group  col-lg-2 {{ $errors->has('priceB') ? ' has-error' : '' }}">
                    <label for="price">@lang('lang.priceB')</label>
                    <input type="number" min="1" name="priceB" class="form-control" value="{{$product->priceB }}" style="height: 46px;width: 70%" />
                    <span class="input-group-addon" style="width: 50%">SR </span>
                    <span class="help-block">{{ $errors->first('price', ':message') }}</span>
                </div>
                <div class="form-group  col-lg-2 {{ $errors->has('priceA') ? ' has-error' : '' }}">
                    <label for="price">@lang('lang.priceA')</label>
                    <input type="number" min="1" name="priceA" class="form-control" value="{{$product->priceA }}" style="height: 46px;width: 70%"/>
                    <span class="input-group-addon" style="width: 50%">SR  </span>
                    <span class="help-block">{{ $errors->first('price', ':message') }}</span>
                </div>
                <div class="form-group col-lg-2 {{ $errors->has('stock') ? ' has-error' : '' }}">
                    <span style="font-weight: bold;  text-align: center; ">@lang('lang.stock')</span>
                    <input type="number" name="stock" class="form-control" value="{{$product->stock }}" style="height: 46px; width: 70%;" />
                    <span class="help-block">{{ $errors->first('stock', ':message') }}</span>
                </div>
                <div class="form-group col-lg-2 {{ $errors->has('color') ? ' has-error' : '' }}">
                    <label for="titleEn">@lang('lang.color')</label>
                    <input  type="color" id="color" name="color" style="width: 50px; border-radius: 50%" class="form-control" value="{{$product->color }}" />

                    <span class="help-block">{{ $errors->first('color', ':message') }}</span>
                </div>
                <div class="form-group col-lg-4 {{ $errors->has('images') ? ' has-error' : '' }}">
                    <label for="images">@lang('lang.Image')</label>
                    <input type="file" name="img" multiple class="form-control-file" id="images" aria-describedby="fileHelp" >
                    <img class="card-img-top" src="{{ asset('images/products/' . $product->img) }} " style="width:150px;height:100px;" >
                    <span class="help-block">{{ $errors->first('images', ':message') }}</span>
                </div>
                <div class="form-group col-lg-9 {{ $errors->has('info_ar') ? ' has-error' : '' }}">
                    <label for="bodyAr">@lang('lang.info_ar')</label>
                    <textarea type="body" rows="5" class="form-control"  name="infoAr">{{$product->infoAr}}</textarea>
                </div>
                <div class="form-group col-lg-9 {{ $errors->has('info_en') ? ' has-error' : '' }}">
                    <label for="info_en">@lang('lang.info_en')</label>
                    <textarea type="body" rows="5" class="form-control"  name="infoEn"> {{$product->infoEn}}</textarea>
                </div>
                <div class="form-group col-lg-9 {{ $errors->has('info_ur') ? ' has-error' : '' }}">
                    <label for="info_ur">@lang('lang.info_ur')</label>
                    <textarea type="body" rows="5" class="form-control"  name="infoUr">  {{$product->infoUr}}</textarea>
                </div>
                <div class="form-group col-lg-2 {{ $errors->has('publish') ? ' has-error' : '' }}">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="publish" name="publish" checked >
                            @lang('lang.publish')
                        </label>
                    </div>
                </div>






                    <div class="form-group center">
                        <div class="col-md-offset-2 col-md-4">
                            <a href="/admin/addproduct" class="btn btn-block btn-danger" role="button">@lang('lang.Cancel')</a>
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
