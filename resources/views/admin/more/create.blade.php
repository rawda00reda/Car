@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box box-default color-palette-box ">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('lang.addproduct')</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/admin/more/'.$id .'/find')}}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group  col-lg-2 {{ $errors->has('priceB') ? ' has-error' : '' }}">
                        <label for="price">@lang('lang.priceB')</label>
                        <input type="number" min="1" name="priceB" class="form-control" value="{!! old('price') !!}" style="height: 46px;width: 70%" />
                        <span class="input-group-addon" style="width: 50%">SR </span>
                        <span class="help-block">{{ $errors->first('price', ':message') }}</span>
                    </div>
                    <div class="form-group  col-lg-2 {{ $errors->has('priceA') ? ' has-error' : '' }}">
                        <label for="price">@lang('lang.priceA')</label>
                        <input type="number" min="1" name="priceA" class="form-control" value="{!! old('price') !!}" style="height: 46px;width: 70%"/>
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
                    <div class="form-group col-lg-2 {{ $errors->has('images') ? ' has-error' : '' }}">
                        <label for="images">@lang('lang.Image')</label>
                        <input type="file" name="img" multiple class="form-control-file" id="images" aria-describedby="fileHelp" >
                        <span class="help-block">{{ $errors->first('images', ':message') }}</span>
                    </div>
                    <hr>

                    <div class="form-group center">
                        <div class="col-md-offset-3 col-lg-6">
                            <a href="/admin/addproduct" class="btn btn-block btn-danger" role="button">@lang('lang.Cancel')</a>
                        </div>
                        <div class="col-md-offset-3 col-lg-6">
                            <button type="submit" class="btn btn-block btn-primary">@lang('lang.Add')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
