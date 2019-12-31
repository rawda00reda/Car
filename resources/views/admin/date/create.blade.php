@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box box-default color-palette-box ">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('lang.Add') @lang('lang.date')</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <form method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/admin/date')}}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body col-md-8 col-sm-offset-1">

                        <div class="form-group col-lg-6">
                            <label  for="filter">@lang('lang.CarModel')</label>
                            <select id="filter" name="model_id" class="form-control" style="height: 46px; width: 80%">
                                @foreach ($models as $model)
                                    @if ( app()->getLocale() == 'ar' )
                                        <option value="{{ $model->id }}" >{{ $model->titleAr }}</option>
                                    @elseif ( app()->getLocale() == 'en' )
                                        <option value="{{ $model->id }}" >{{ $model->titleEn }}</option>
                                    @else
                                        <option value="{{ $model->id }}" >{{ $model->titleEn }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-lg-6 {{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="date">@lang('lang.Add') @lang('lang.date')  </label>
                            <input type="text" id="date" name="date" class="form-control"  value="{!! old('date') !!}" />
                            <span class="help-block">{{ $errors->first('date', ':message') }}</span>
                        </div>
                    </div>

                    <hr>
                    <div class="form-group center">
                        <div class="col-md-offset-2 col-md-4">
                            <a href="/admin/date" class="btn btn-block btn-danger" role="button">@lang('lang.Cancel')</a>
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
