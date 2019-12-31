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
                <div class="form-group col-lg-3">
                    <label  for="filter">@lang('lang.dept')</label>
                    <select id="filter" name="deptEn" class="form-control" style="height: 46px; width: 70%">
                        @foreach ($depts as $dept)
                            @if ( app()->getLocale() == 'en' )
                            <option {{ $dept->id == "$product->deptEn" ? "selected" : "" }} value="{{ $dept->id }}" >{{ $dept->titleEn}}</option>
                            @elseif ( app()->getLocale() == 'ar' )
                                <option {{ $dept->id == "$product->deptAr" ? "selected" : "" }} value="{{ $dept->id }}" >{{ $dept->titleAr}}</option>
                              @else
                                <option {{ $dept->id == "$product->deptUr" ? "selected" : "" }} value="{{ $dept->id }}" >{{ $dept->titleUr}}</option>
                              @endif
                                @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-3">
                    <label  for="filter">@lang('lang.special')</label>
                    <select id="filter" name="specialEn" class="form-control" style="height: 46px; width: 70%">
                        @foreach ($specials as $special)
                            @if ( app()->getLocale() == 'en' )
                            <option {{ $special->id == "$product->specialEn" ? "selected" : "" }} value="{{ $special->id }}" >{{ $special->titleEn}}</option>
                        @elseif ( app()->getLocale() == 'ar' )
                                <option {{ $special->id == "$product->specialAr" ? "selected" : "" }} value="{{ $special->id }}" >{{ $special->titleAr}}</option>
                            @else
                                <option {{ $special->id == "$product->specialUr" ? "selected" : "" }} value="{{ $special->id }}" >{{ $special->titleUr}}</option>
                            @endif
                                @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-3">
                    <label  for="filter">@lang('lang.branch')</label>
                    <select id="filter" name="branchEn" class="form-control" style="height: 46px; width: 70%">
                        @foreach ($branchs as $branch)
                            @if ( app()->getLocale() == 'en' )
                            <option {{ $branch->id == "$product->branchEn" ? "selected" : "" }} value="{{ $branch->id }}" >{{ $branch->titleEn}}</option>
                            @elseif ( app()->getLocale() == 'ar' )
                                <option {{ $branch->id == "$product->branchAr" ? "selected" : "" }} value="{{ $branch->id }}" >{{ $branch->titleAr}}</option>
                            @else
                                <option {{ $branch->id == "$product->branchUr" ? "selected" : "" }} value="{{ $branch->id }}" >{{ $branch->titleUr}}</option>
                            @endif
                            @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-3 {{ $errors->has('name_en') ? ' has-error' : '' }}">
                    <label for="name_en">@lang('lang.name')</label>
                    @if ( app()->getLocale() == 'en' )
                    <input type="text" id="name_en" name="nameEn" class="form-control" value="{{$product->proEn }}" />
                    @elseif ( app()->getLocale() == 'ar' )
                        <input type="text" id="name_en" name="nameEn" class="form-control" value="{{$product->proAr }}" />
                    @else
                        <input type="text" id="name_en" name="nameEn" class="form-control" value="{{$product->proUr }}" />
                    @endif
                    <span class="help-block">{{ $errors->first('name_en', ':message') }}</span>
                </div>
                <div class="form-group col-lg-3 ">

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
                @if(count($ProductData) > 0)
                         @foreach($ProductData as $ProductDat)
                <div class="form-group  col-lg-2 {{ $errors->has('priceB') ? ' has-error' : '' }}">
                    <label for="price">@lang('lang.priceB')</label>
                    <input type="number" min="1" name="priceB" class="form-control" value="{{$ProductDat->priceB }}" style="height: 46px;width: 70%" />
                    <span class="input-group-addon" style="width: 50%">SR </span>
                    <span class="help-block">{{ $errors->first('price', ':message') }}</span>
                </div>
                <div class="form-group  col-lg-2 {{ $errors->has('priceA') ? ' has-error' : '' }}">
                    <label for="price">@lang('lang.priceA')</label>
                    <input type="number" min="1" name="priceA" class="form-control" value="{{$ProductDat->priceA }}" style="height: 46px;width: 70%"/>
                    <span class="input-group-addon" style="width: 50%">SR  </span>
                    <span class="help-block">{{ $errors->first('price', ':message') }}</span>
                </div>
                <div class="form-group col-lg-2 {{ $errors->has('stock') ? ' has-error' : '' }}">
                    <span style="font-weight: bold;  text-align: center; ">@lang('lang.stock')</span>
                    <input type="number" name="stock" class="form-control" value="{{$ProductDat->stock }}" style="height: 46px; width: 70%;" />
                    <span class="help-block">{{ $errors->first('stock', ':message') }}</span>
                </div>
                <div class="form-group col-lg-2 {{ $errors->has('color') ? ' has-error' : '' }}">
                    <label for="titleEn">@lang('lang.color')</label>
                    <input  type="color" id="color" name="color" style="width: 50px; border-radius: 50%" class="form-control" value="{{$ProductDat->color }}" />

                    <span class="help-block">{{ $errors->first('color', ':message') }}</span>
                </div>
                <div class="form-group col-lg-4 {{ $errors->has('images') ? ' has-error' : '' }}">
                    <label for="images">@lang('lang.Image')</label>
                    <input type="file" name="img" multiple class="form-control-file" id="images" aria-describedby="fileHelp" >
                    <img class="card-img-top" src="{{ asset('images/products/' . $ProductDat->img) }} " style="width:150px;height:100px;" >
                    <span class="help-block">{{ $errors->first('images', ':message') }}</span>
                </div>
                           @endforeach
                @endif

                <div class="form-group col-lg-9 {{ $errors->has('info_ar') ? ' has-error' : '' }}">
                    <label for="bodyAr">@lang('lang.info')</label>
                    @if ( app()->getLocale() == 'en' )
                    <textarea type="body" rows="5" class="form-control"  name="infoAr">{{$product->infoEn}}</textarea>
                        @elseif ( app()->getLocale() == 'ar' )
                        <textarea type="body" rows="5" class="form-control"  name="infoAr">{{$product->infoAr}}</textarea>
                        @else
                        <textarea type="body" rows="5" class="form-control"  name="infoAr">{{$product->infoUr}}</textarea>
                      @endif
                </div>

            </form>
        </div>
        </div>
    </section>
@endsection
