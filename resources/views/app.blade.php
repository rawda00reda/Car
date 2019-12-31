
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CAR AMBULANCE - أسعف سيارتك</title>
    <link rel="icon" href="{{asset('images/W-LOGO.png')}}" type="image/png"/>

    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{'css/owl.theme.default.min.css'}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @if ( app()->getLocale() == 'ar' | app()->getLocale() == 'ur' )
        <link rel="stylesheet" href="{{asset('css/ar.css')}}">
   @endif

</head>
<body>
<!-- ************************************************************************* -->
<!--  start uper header-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <a class="navbar-brand" href="#"> <img src="{{asset('images/W-LOGO.png')}}" width="125"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">@lang('lang.Home')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">@lang('lang.Features')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/aboutus">@lang('lang.Aboutus')</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @lang('lang.OurProduct')
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Wheels</a>
                    <a class="dropdown-item" href="#">Battery</a>
                    <a class="dropdown-item" href="#">oils</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">@lang('lang.Maintenanceoption')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/Contact">@lang('lang.contacts')</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal"><img src="{{asset('images/login-iconn.png')}}" width="20">@lang('lang.LoginIn')</a>
            </li>
            <li class="nav-item">
                @foreach($contacts as $contact)
                <a class="nav-link" href="#"><img src="{{asset('images/mobile-icon.png')}}" width="15"> {{$contact->phone}}</a>
                    @endforeach
            </li>
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li class="nav-item">
                    <a class="nav-link"  rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                </li>
            @endforeach

        </ul>
    </div>
</nav>
@include('auth/login')

@yield('content')

<!--  start Call -->
<!-- ************************************************************************* -->
<div class="box">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-12">
                <h4>@lang('lang.werecom')</h4>
            </div>
            <div class="col-md-2 col-5">
                <button class="btn btn-warning">@lang('lang.DISCOVERNOW')</button>
            </div>
            <div class="col-md-3 col-7">
                @foreach($socialss as $socials)
                    <a href="{{$socials->link}}" style="    color: #ffffff;">
                        <i class="fab fa-{{$socials->name}}"></i>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--  start Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="img-footer">
                    <img src="{{asset('images/W-LOGO.png')}}" width="110">
                </div>
                <br>
                <p>@lang('lang.oficial') !</p>
                <div class="mobile-icon">
                    <img src="{{asset('images/download.png')}}" width="120">
                    <img src="{{asset('images/google-play.png')}}" width="120">
                </div>
            </div>
            <div class="col-md-4">
                <h4>@lang('lang.Importantlinks')</h4>
                <div class="row">
                    <div class="col-md-6 col-6">
                        <ul>
                            <li>About us</li>
                            <li>Fast Services</li>
                            <li>spare parts</li>

                        </ul>
                    </div>
                    <div class="col-md-6 col-6">
                        <ul>
                            <li>Accessories</li>
                            <li>Batteries</li>
                            <li>Tires</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h4>@lang('lang.contacts')</h4>
                @foreach($contacts as $contact)
                <span><i class="fas fa-map-marker-alt"></i>{{$contact->address}}</span>
                @endforeach
                <br>
                @foreach($contacts as $contact)
                <span><i class="fas fa-phone-volume"></i>{{$contact->phone}}</span>
                    @endforeach
                <br>
                @foreach($contacts as $contact)
                    <span><i class="fas fa-envelope"></i>{{$contact->email}}</span>
                @endforeach
            </div>
        </div>
    </div>
</footer>
<div class="copy-write">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <p>Car Ambulance © 2020. All rights reserved.</p>
            </div>
            <div class="col-md-4 text-center">
                <p>Powerd by <b>Orange Soft</b></p>
            </div>
            <div class="col-md-4 text-right">

            </div>
        </div>
    </div>
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</div>
</body>
</html>
