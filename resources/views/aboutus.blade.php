@extends('app')
@section('content')
<!-- LOGIN & REgister PAGE -->
<br><br><br>
<!--**********************************************************-->
    <!--  start about-us-->
<section class="about-banner text-center">
   <div class="head-onBanner">
       <h1>@lang('lang.Aboutus')</h1>
   </div>
</section>

<div class="aboutus-infor">
    @foreach($abouts as $about)
        <div class="container">
            @if ( app()->getLocale() == 'en')
            <h2 class="text-center">{{$about->qus_en}}</h2>
            <p>{{$about->body_en}}</p>
                @elseif ( app()->getLocale() == 'ar')
                    <h2 class="text-center">{{$about->qus_ar}}</h2>
                    <p>{{$about->body_ar}}</p>
                @else
                    <h2 class="text-center">{{$about->qus_ur}}</h2>
                    <p>{{$about->body_ur}}</p>
                @endif
 </div>
        @endforeach
</div>

<br><br>
    @endsection

