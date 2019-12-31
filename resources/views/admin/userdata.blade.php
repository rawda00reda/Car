@extends('admin.layouts.app')
@section('title', __('lang.users'))
@section('sitetitle', __('lang.users'))

<!-- Main content -->
@section('content')

    <section class="content">
        <div class="box box-default color-palette-box ">
            <div class="box-header with-border">
                <h3 class="box-title">
                    @lang('lang.UserDetails')
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="box-body col-md-10 col-sm-offset-1">
                    <div class="form-group col-lg-12 {{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="titleAr">@lang('lang.username')</label>
                        <input type="text" id="username" name="username" class="form-control"  value="{{$user->user_name}}" />
                        <span class="help-block">{{ $errors->first('titleAr', ':message') }}</span>
                    </div>
                    <div class="form-group col-lg-12 {{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="titleAr">@lang('lang.phone')</label>
                        <input type="text" id="phone" name="titleUr" class="form-control"  value="{{$user->phone}}" />
                        <span class="help-block">{{ $errors->first('phone', ':message') }}</span>
                    </div>
                    <div class="form-group col-lg-12 {{ $errors->has('country') ? ' has-error' : '' }}">
                        <label for="email">@lang('lang.country')</label>
                        <input type="text" id="country" name="country" class="form-control"  value="{{$user->country}}" />
                        <span class="help-block">{{ $errors->first('country', ':message') }}</span>
                    </div>
                    <div class="form-group col-lg-12 {{ $errors->has('city') ? ' has-error' : '' }}">
                        <label for="email">@lang('lang.city')</label>
                        <input type="text" id="city" name="city" class="form-control"  value="{{$user->city}}" />
                        <span class="help-block">{{ $errors->first('city', ':message') }}</span>
                    </div>
                    <div class="form-group col-lg-12 {{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="email">@lang('lang.address')</label>
                        <input type="text" id="address" name="address" class="form-control"  value="{{$user->address}}" />
                        <span class="help-block">{{ $errors->first('address', ':message') }}</span>
                    </div>
                    <div class="form-group col-lg-8 {{ $errors->has('info_ar') ? ' has-error' : '' }}">
                        <label for="info_ar">@lang('lang.note')</label>
                        <textarea class="textarea" name="info_ar"
                                  style="width: 100%; height: 120px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$user->note}}</textarea>
                        <span class="help-block">{{ $errors->first('info_ar', ':message') }}</span>
                    </div>


                </div>
                <hr>
            </div>
        </div>
    </section>
@endsection

