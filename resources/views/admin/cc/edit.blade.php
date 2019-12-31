@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box box-default color-palette-box ">
            <div class="box-header with-border">
                <h3 class="box-title">
                    @lang('lang.Update') @lang('lang.cc')
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <form method="POST"  action="{{action('CcController@update', $cc->id)}}" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PATCH">
                    {{ csrf_field() }}

                    @csrf
                    <div class="box-body col-md-10 col-sm-offset-1">
                        <div class="form-group col-lg-4">
                            <label  for="filter">@lang('lang.date')</label>
                            <select id="filter" name="date_id" class="form-control" style="height: 46px; width: 70%">
                                @foreach ($dates as $date)
                                    <option {{ $date->id == "$cc->date_id" ? "selected" : "" }} value="{{ $date->id }}" >{{ $date->date}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-lg-3 {{ $errors->has('cc') ? ' has-error' : '' }}">
                            <label for="cc">@lang('lang.cc')</label>
                            <input type="text" id="cc" name="cc" class="form-control"  value="{{$cc->cc}}" />
                            <span class="help-block">{{ $errors->first('cc', ':message') }}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group center">
                        <div class="col-md-offset-2 col-md-4">
                            <a href="/admin/cc" class="btn btn-block btn-danger" role="button">@lang('lang.Cancel')</a>
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
