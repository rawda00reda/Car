@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box box-default color-palette-box ">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('lang.Add') @lang('lang.cc')</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <form method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/admin/cc')}}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body col-md-8 col-sm-offset-1">

                        <div class="form-group col-lg-4 {{ $errors->has('cc') ? ' has-error' : '' }}">
                            <label for="cc">@lang('lang.Add') @lang('lang.cc')  </label>
                            <input type="text" id="cc" name="cc" class="form-control"  value="{!! old('cc') !!}" />
                            <span class="help-block">{{ $errors->first('cc', ':message') }}</span>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group center" style="margin-right: 600px">
                        <div class="col-md-offset-2 col-md-2">
                            <a href="/admin/cc" class="btn btn-block btn-danger" role="button">@lang('lang.Cancel')</a>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-block btn-primary">@lang('lang.Add')</button>
                        </div>
                    </div>
            </form>
        </div>
        </div>
    </section>
@endsection
