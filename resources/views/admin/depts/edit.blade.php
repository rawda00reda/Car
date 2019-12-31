@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box box-default color-palette-box ">
            <div class="box-header with-border">
                <h3 class="box-title">
                    @lang('lang.Update') @lang('lang.depts')
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <form method="POST"  action="{{action('DepartmentControl@update', $dept->id)}}" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PATCH">
                    {{ csrf_field() }}

                    @csrf
                    <div class="box-body col-md-10 col-sm-offset-1">

                        <div class="form-group col-lg-12 {{ $errors->has('titleAr') ? ' has-error' : '' }}">
                            <label for="titleAr">@lang('lang.titleAr')</label>
                            <input type="text" id="myname_ar" name="titleAr" class="form-control"  value="{{$dept->titleAr}}" />
                            <span class="help-block">{{ $errors->first('titleAr', ':message') }}</span>
                        </div>
                        <div class="form-group col-lg-12 {{ $errors->has('titleEn') ? ' has-error' : '' }}">
                            <label for="titleAr">@lang('lang.titleEn')</label>
                            <input type="text" id="myname_ar" name="titleEn" class="form-control"  value="{{$dept->titleEn}}" />
                            <span class="help-block">{{ $errors->first('titleEn', ':message') }}</span>
                        </div>
                        <div class="form-group col-lg-12 {{ $errors->has('titleUr') ? ' has-error' : '' }}">
                            <label for="titleAr">@lang('lang.titleUr')</label>
                            <input type="text" id="myname_ar" name="titleUr" class="form-control"  value="{{$dept->titleUr}}" />
                            <span class="help-block">{{ $errors->first('titleUr', ':message') }}</span>
                        </div>
{{--                        <div class="form-group col-lg-12 {{ $errors->has('content') ? ' has-error' : '' }}">--}}
{{--                            <label for="textAr">@lang('lang.content')</label>--}}
{{--                            <textarea class="textarea" name="content"--}}
{{--                                      style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$projects->content}}</textarea>--}}
{{--                            <span class="help-block">{{ $errors->first('content', ':message') }}</span>--}}
{{--                        </div>                        <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }}">--}}
{{--                            <label for="img">@lang('lang.Image')</label>--}}
{{--                            <input type="file"  name="img" multiple class="form-control-file" id="img" aria-describedby="fileHelp">--}}
{{--                            <img class="card-img-top" src="{{ asset('img/projects/' . $projects->img) }} " style="width:150px;height:150px;" >--}}
{{--                            <span class="help-block">{{ $errors->first('img', ':message') }}</span>--}}
{{--                        </div>--}}
                    </div>
                    <hr>
                    <div class="form-group center">
                        <div class="col-md-offset-2 col-md-4">
                            <a href="/admin/clients" class="btn btn-block btn-danger" role="button">@lang('lang.Cancel')</a>
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
