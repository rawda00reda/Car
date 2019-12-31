
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <br><br><br>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="middlle">
                    <br>
                    <div class="form signin">
                        <h2>@lang('lang.Signin')</h2>
                        <form  method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group ">
                                <label for="email" >@lang('lang.email')</label>
                                <input  class="inputbox form-control" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label for="password" >@lang('lang.password')</label>
                                <input id="password" class="inputbox pass form-control" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div>
                                <button type="submit">@lang('lang.Signin')</button>
                            </div>
                        </form> <br>

                        <div class="forgot text-center">
                            <a href="#" class="newemail">@lang('lang.createAccount')</a>
                        </div>
                    </div>
                    <div class="form signup">
                        <h2>@lang('lang.signup')</h2>
                        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                            @csrf

                            <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label>@lang('lang.name')</label>
                                <input type="text" name="name" class="inputbox form-control" placeholder="@lang('lang.name') ">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                @if ($errors->has('name'))
                                    <span class="help-block ">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label>@lang('lang.email')</label>
                                <input type="email" name="email" class="inputbox form-control" placeholder="@lang('lang.email') ">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                @if ($errors->has('email'))
                                    <span class="help-block ">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback {{ $errors->has('mobile') ? ' has-error' : '' }}">
                                <label>@lang('lang.mobile')</label>
                                <input type="text" name="mobile" class="inputbox form-control" placeholder="@lang('lang.mobile') ">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                @if ($errors->has('mobile'))
                                    <span class="help-block ">
                                     <strong>{{ $errors->first('mobile') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label>@lang('lang.password')</label>
                                <input type="password" name="password" class="inputbox form-control" placeholder="@lang('lang.password') ">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                @if ($errors->has('password'))
                                    <span class="help-block ">
                                     <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label>@lang('lang.cpassword')</label>
                                <input id="password_confirmation" type="password" class="inputbox form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" required autofocus type="password_confirmation" placeholder="@lang('lang.cpassword') ">
                                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block ">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
                                @endif
                            </div>


                            <div>
                                <button type="submit">@lang('lang.signup')</button>
                            </div>
                        </form> <br>
                        <div class="forgot text-center">
                            <a href="/login" class="signinn">@lang('lang.Signin')</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
