@extends('app')
@section('content')
    <!--********************* END HEADER *************************-->
    <div class="container">
        <div class="user-data">
            <div class="prf-img">
                <img src="{{asset('images/user.png')}}" alt="">
            </div>
            <div class="user-data">
                <div>
                    <div class="row">
                        <form   method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/Account',Auth::user()->id)}}" >
                            {{ csrf_field() }}
                            <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
                                <b>Name:</b>
                                <input type="text" value="{{ Auth::user()->name }}" name="name" class="inputbox" placeholder="Name" required style="width: 463px;    margin-left: 30px;">
                                @if ($errors->has('name'))
                                    <span class="help-block ">
                            <strong>{{ $errors->first('name') }}</strong>
                           </span>
                                @endif
                            </div>
                            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                                <b>Email :</b>
                                <input type="email" value="{{ Auth::user()->email}}" name="email" class="inputbox" placeholder="Email" required    style=" width: 463px; margin-left:20px;">
                                @if ($errors->has('email'))
                                    <span class="help-block ">
                             <strong>{{ $errors->first('email') }}</strong>
                           </span>
                                @endif
                            </div>
                            <div class="form-group has-feedback {{ $errors->has('mobile') ? ' has-error' : '' }}">
                                <b>Mobile :</b>
                                <input type="number" value="{{ Auth::user()->mobile}}" name="mobile" class="inputbox" placeholder="Mobile" required    style="    margin-left: 10px; width: 463px;">
                                @if ($errors->has('mobile'))
                                    <span class="help-block ">
                             <strong>{{ $errors->first('mobile') }}</strong>
                           </span>
                                @endif
                            </div>
                            <div class="form-group has-feedback {{ $errors->has('country') ? ' has-error' : '' }}">
                                <b>Country :</b>
                                <input type="text" value="{{ Auth::user()->country}}" name="country" class="inputbox" placeholder="country" required    style=" width: 463px;">
                                @if ($errors->has('country'))
                                    <span class="help-block ">
                             <strong>{{ $errors->first('country') }}</strong>
                           </span>
                                @endif
                            </div>
                            <div class="form-group has-feedback {{ $errors->has('city') ? ' has-error' : '' }}">
                                <b>City :</b>
                                <input type="text" value="{{ Auth::user()->city}}" name="city" class="inputbox" placeholder="city" required    style="    margin-left: 30px; width: 463px;">
                                @if ($errors->has('city'))
                                    <span class="help-block ">
                             <strong>{{ $errors->first('city') }}</strong>
                           </span>
                                @endif
                            </div>
                            <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                                <b>Password :</b>
                                <input type="password" value="{{ Auth::user()->password}}" name="password" class="inputbox" placeholder="" required    style=" width: 463px;">
                                @if ($errors->has('password'))
                                    <span class="help-block ">
                             <strong>{{ $errors->first('password') }}</strong>
                           </span>
                                @endif
                            </div>
                            <div style="margin-left:90px;">
                                <button style="width: 275px; height: 30px;display: block;margin: auto; color: #fff;background-color: #f6cb63;border: 0; border-radius: 5px;"
                                        type="submit">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
    <br> <br>
    <!--********************** Shopping item ****************-->
    <!--********************** item User Like****************-->

@endsection
