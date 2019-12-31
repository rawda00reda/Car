@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box box-default color-palette-box ">
            <div class="box-header with-border">
                <h3 class="box-title">
                    @lang('lang.Update') @lang('lang.date')
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <form method="POST"  action="{{action('DateController@update', $date->id)}}" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PATCH">
                    {{ csrf_field() }}

                    @csrf
                    <div class="box-body col-md-10 col-sm-offset-1">

                        <div class="form-group col-lg-3 {{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="date">@lang('lang.date')</label>
                            <input type="text" id="myname_ar" name="date" class="form-control"  value="{{$date->date}}" />
                            <span class="help-block">{{ $errors->first('date', ':message') }}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group center">
                        <div class="col-md-offset-2 col-md-4">
                            <a href="/admin/carmodel" class="btn btn-block btn-danger" role="button">@lang('lang.Cancel')</a>
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
