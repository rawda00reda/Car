@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            @lang('lang.service')
        </h1>
    </section>
    <div class="box-body ">
    <form  role="form" method="POST"
          action="{{action('ServiceController@update',$service)}}"
          enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
        <div class="modal-body">
            @csrf
            @method('PUT')
        </div>
        <div class="box-body col-md-10 col-sm-offset-1">

            <div class="form-group col-lg-8 {{ $errors->has('title_ar') ? ' has-error' : '' }}">
                <label for="title_ar">@lang('lang.title_ar')</label>
                <input type="text" id="title_ar" name="title_ar" class="form-control"  value="{{$service->title_ar}}" />
                <span class="help-block">{{ $errors->first('title_ar', ':message') }}</span>
            </div>

            <div class="form-group col-lg-8 {{ $errors->has('title_en') ? ' has-error' : '' }}">
                <label for="title_en">@lang('lang.title_en')</label>
                <input type="text" id="title_en" name="title_en" class="form-control"  value="{{$service->title_en}}" />
                <span class="help-block">{{ $errors->first('title_en', ':message') }}</span>
            </div>

            <div class="form-group col-lg-8 {{ $errors->has('title_ur') ? ' has-error' : '' }}">
                <label for="title_ur">@lang('lang.title_ur')</label>
                <input type="text" id="title_ur" name="title_ur" class="form-control"  value="{{$service->title_ur}}" />
                <span class="help-block">{{ $errors->first('title_ur', ':message') }}</span>
            </div>

            <div class="form-group col-lg-8 {{ $errors->has('body_ar') ? ' has-error' : '' }}">
                <label for="body_ar">@lang('lang.body_ar')</label>
                <textarea class="textarea" name="body_ar"
                          style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$service->body_ar}}</textarea>
                <span class="help-block">{{ $errors->first('body_ar', ':message') }}</span>
            </div>

            <div class="form-group col-lg-8 {{ $errors->has('body_en') ? ' has-error' : '' }}">
                <label for="body_en">@lang('lang.body_en')</label>
                <textarea class="textarea" name="body_en"
                          style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$service->body_en}}</textarea>
                <span class="help-block">{{ $errors->first('body_en', ':message') }}</span>
            </div>

            <div class="form-group col-lg-8 {{ $errors->has('body_ur') ? ' has-error' : '' }}">
                <label for="body_ur">@lang('lang.body_ur')</label>
                <textarea class="textarea" name="body_ur"
                          style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$service->body_ur}}</textarea>
                <span class="help-block">{{ $errors->first('body_ur', ':message') }}</span>
            </div>


            <div class="form-group col-lg-8 {{ $errors->has('img') ? ' has-error' : '' }}">
                <label for="img">@lang('lang.Image')</label>
                <input type="file"  name="img" multiple class="form-control-file" id="img" aria-describedby="fileHelp">
                <img class="card-img-top" src="{{ asset('images/services/' . $service->img) }} " style="width:200px;height:200px;" >
                <span class="help-block">{{ $errors->first('img', ':message') }}</span>
            </div>


        </div>
        <div class="modal-footer">
            <div class="box-body col-md-10 col-sm-offset-1">
                <a href="/admin/services" type="button" class="btn btn-default pull-left"
                        data-dismiss="modal">@lang('lang.cancel')</a>
                <button type="submit" class="btn btn-primary">@lang('lang.Update')</button>
            </div>
        </div>
    </form>
    </div>

    @endsection

