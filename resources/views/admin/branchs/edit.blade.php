@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box box-default color-palette-box ">
            <div class="box-header with-border">
                <h3 class="box-title">
                    @lang('lang.Update') @lang('lang.branch')
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <form method="POST"  action="{{action('BranchController@update', $branch->id)}}" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PATCH">
                    {{ csrf_field() }}

                    @csrf
                    <div class="box-body col-md-10 col-sm-offset-1">

                        <div class="form-group col-lg-12 {{ $errors->has('titleAr') ? ' has-error' : '' }}">
                            <label for="titleAr">@lang('lang.branchAr')</label>
                            <input type="text" id="myname_ar" name="titleAr" class="form-control"  value="{{$branch->titleAr}}" />
                            <span class="help-block">{{ $errors->first('titleAr', ':message') }}</span>
                        </div>
                        <div class="form-group col-lg-12 {{ $errors->has('titleEn') ? ' has-error' : '' }}">
                            <label for="titleAr">@lang('lang.branchEn')</label>
                            <input type="text" id="myname_ar" name="titleEn" class="form-control"  value="{{$branch->titleEn}}" />
                            <span class="help-block">{{ $errors->first('titleEn', ':message') }}</span>
                        </div>
                        <div class="form-group col-lg-12 {{ $errors->has('titleUr') ? ' has-error' : '' }}">
                            <label for="titleAr">@lang('lang.branchUr')</label>
                            <input type="text" id="myname_ar" name="titleUr" class="form-control"  value="{{$branch->titleUr}}" />
                            <span class="help-block">{{ $errors->first('titleUr', ':message') }}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group center">
                        <div class="col-md-offset-2 col-md-4">
                            <a href="/admin/branch" class="btn btn-block btn-danger" role="button">@lang('lang.Cancel')</a>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-block btn-primary">@lang('lang.update')</button>
                        </div>
                    </div>

            </div>
            </form>
        </div>
        </div>
    </section>
@endsection
