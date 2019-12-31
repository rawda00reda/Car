@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('lang.faq')
        </h1>
    </section>
    <div class="box-body ">
    <form  role="form" method="POST"
          action="{{action('FaqController@update',$faq)}}"
          enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
        <div class="modal-body">
            @csrf
            @method('PUT')
        </div>
        <div class="box-body col-md-10 col-sm-offset-1">

            <div class="form-group col-lg-8 {{ $errors->has('qus_ar') ? ' has-error' : '' }}">
                <label for="qus_ar">@lang('lang.titleAr')</label>
                <input type="text" id="qus_ar" name="qus_ar" class="form-control"  value="{{$faq->qus_ar}}" />
                <span class="help-block">{{ $errors->first('qus_ar', ':message') }}</span>
            </div>

            <div class="form-group col-lg-8 {{ $errors->has('qus_en') ? ' has-error' : '' }}">
                <label for="qus_en">@lang('lang.titleEn')</label>
                <input type="text" id="qus_en" name="qus_en" class="form-control"  value="{{$faq->qus_en}}" />
                <span class="help-block">{{ $errors->first('qus_en', ':message') }}</span>
            </div>

            <div class="form-group col-lg-8 {{ $errors->has('qus_ur') ? ' has-error' : '' }}">
                <label for="qus_ur">@lang('lang.titleUr')</label>
                <input type="text" id="qus_ur" name="qus_ur" class="form-control"  value="{{$faq->qus_ur}}" />
                <span class="help-block">{{ $errors->first('qus_ur', ':message') }}</span>
            </div>

            <div class="form-group col-lg-8 {{ $errors->has('body_ar') ? ' has-error' : '' }}">
                <label for="body_ar">@lang('lang.body_ar')</label>
                <textarea class="textarea" name="body_ar"
                          style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$faq->body_ar}}</textarea>
                <span class="help-block">{{ $errors->first('body_ar', ':message') }}</span>
            </div>

            <div class="form-group col-lg-8 {{ $errors->has('body_en') ? ' has-error' : '' }}">
                <label for="body_en">@lang('lang.body_en')</label>
                <textarea class="textarea" name="body_en"
                          style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$faq->body_en}}</textarea>
                <span class="help-block">{{ $errors->first('body_en', ':message') }}</span>
            </div>

            <div class="form-group col-lg-8 {{ $errors->has('body_ur') ? ' has-error' : '' }}">
                <label for="body_ur">@lang('lang.body_ur')</label>
                <textarea class="textarea" name="body_ur"
                          style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$faq->body_ur}}</textarea>
                <span class="help-block">{{ $errors->first('body_ur', ':message') }}</span>
            </div>
        </div>
        <div class="modal-footer">
            <div class="box-body col-md-10 col-sm-offset-1">
                <a href="/admin/welcome" type="button" class="btn btn-default pull-left"
                        data-dismiss="modal">@lang('lang.cancel')</a>
                <button type="submit" class="btn btn-primary">@lang('lang.Update')</button>
            </div>
        </div>
    </form>
    </div>

    @endsection

