@extends('app')
@section('content')

<!-- LOGIN & REgister PAGE -->
<br><br><br><br><br>
<!--**********************************************************-->
    <!--  start about-us-->
<div class="contact-page">
<div class="container">
   <h2>@lang('lang.contacts')</h2>
   <br><br>
   <div class="row">
       <div class="col-md-6 contactus-inffo">
            <p>Talk to us about whatever you like! Ask us anything, and we'll get back to you within 24-48 hours. </p>
            <p>* Please add your order number to the message body if you have a question about a specific order.</p>
            <p>Address: Saudi Arabia, The Main center-Jeddah-AL Rehab – PrinceMetebst.-No. 201</p>
            <p>Hotline: 00966 -12 - 6593999</p>
      </div>
      <div class="col-md-6">
          <form class="well"  id="login" method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/Contact')}}" >
              {{ csrf_field() }}
              <div class="form-group  {{ $errors->has('name') ? ' has-error' : '' }}">
                  <input type="text" name="name" class="form-control" placeholder="@lang('lang.name') ">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  @if ($errors->has('name'))
                      <span class="help-block ">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                  @endif
              </div>
              <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                  <input type="email" name="email" class=" form-control" placeholder="@lang('lang.email') ">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  @if ($errors->has('email'))
                      <span class="help-block ">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                  @endif
              </div>

              <div class="form-group has-feedback {{ $errors->has('mobile') ? ' has-error' : '' }}">
                  <input type="text" name="subject" class=" form-control" placeholder="@lang('lang.mobile') ">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  @if ($errors->has('mobile'))
                      <span class="help-block ">
                                     <strong>{{ $errors->first('mobile') }}</strong>
                                </span>
                  @endif
              </div>


              <div class="form-group has-feedback {{ $errors->has('message') ? ' has-error' : '' }}">
                  <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="@lang('lang.message')"></textarea>
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  @if ($errors->has('message'))
                      <span class="help-block ">
                                     <strong>{{ $errors->first('message') }}</strong>
                                </span>
                  @endif
              </div>

              <button type="submit" class="btn btn-warning">@lang('lang.sendmessage')</button><br>
        </form>
     </div>
   </div>
</div>
</div>

<br><br>
    @endsection

