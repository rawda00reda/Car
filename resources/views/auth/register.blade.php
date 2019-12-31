{{--@extends('app')--}}

{{--@section('content')--}}
{{--    <br><br>--}}
{{-- <div class="container text-center">--}}
{{--        <a href="/"><img src="{{asset('images/logo.png')}}" width="100" alt=""></a>--}}
{{--    </div>--}}
{{--<section id="main">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-4"></div>--}}
{{--            <div class="col-md-4 ">--}}
{{--                <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">--}}
{{--                    @csrf--}}
{{--                    <div class="row">--}}
{{--                            </div>--}}
{{--                    <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">--}}
{{--                        <label>@lang('lang.name')</label>--}}
{{--                        <input type="text" name="name" class="form-control" placeholder="@lang('lang.name') ">--}}
{{--                        <span class="glyphicon glyphicon-user form-control-feedback"></span>--}}
{{--                        @if ($errors->has('name'))--}}
{{--                            <span class="help-block ">--}}
{{--                                <strong>{{ $errors->first('name') }}</strong>--}}
{{--                            </span>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                    <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">--}}
{{--                        <label>@lang('lang.email')</label>--}}
{{--                        <input type="email" name="email" class="form-control" placeholder="@lang('lang.email') ">--}}
{{--                        <span class="glyphicon glyphicon-user form-control-feedback"></span>--}}
{{--                        @if ($errors->has('email'))--}}
{{--                            <span class="help-block ">--}}
{{--                                <strong>{{ $errors->first('email') }}</strong>--}}
{{--                            </span>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                    <div class="form-group has-feedback {{ $errors->has('mobile') ? ' has-error' : '' }}">--}}
{{--                            <label>@lang('lang.mobile')</label>--}}
{{--                            <input type="text" name="mobile" class="form-control" placeholder="@lang('lang.mobile') ">--}}
{{--                            <span class="glyphicon glyphicon-user form-control-feedback"></span>--}}
{{--                            @if ($errors->has('mobile'))--}}
{{--                                <span class="help-block ">--}}
{{--                                     <strong>{{ $errors->first('mobile') }}</strong>--}}
{{--                                </span>--}}
{{--                            @endif--}}
{{--                        </div>--}}

{{--                    <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">--}}
{{--                            <label>@lang('lang.password')</label>--}}
{{--                            <input type="password" name="password" class="form-control" placeholder="@lang('lang.password') ">--}}
{{--                            <span class="glyphicon glyphicon-user form-control-feedback"></span>--}}
{{--                            @if ($errors->has('password'))--}}
{{--                                <span class="help-block ">--}}
{{--                                     <strong>{{ $errors->first('password') }}</strong>--}}
{{--                                    </span>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">--}}
{{--                        <label>@lang('lang.cpassword')</label>--}}
{{--                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" required autofocus type="password_confirmation" placeholder="@lang('lang.cpassword') ">--}}
{{--                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>--}}
{{--                            @if ($errors->has('password_confirmation'))--}}
{{--                                <span class="help-block ">--}}
{{--                <strong>{{ $errors->first('password_confirmation') }}</strong>--}}
{{--            </span>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    <button type="submit" class="form-control">@lang('lang.Signin')</button><br>--}}
{{--                    <p class="text-center"> <a href="/login">@lang('lang.Signin') </a></p>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
{{--@endsection--}}

