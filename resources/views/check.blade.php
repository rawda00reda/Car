@extends('app')
@section('content')
<br>
<br>

<div class="container">
<div class="shopping">
    @if ( app()->getLocale() == 'en')

    <h2 class="text-center">  <br><br>The Order Has Been Done <i class="fas fa-check"></i><br>
   Will Contact you Soon <br> Thank You  <br> <br></h2>
        @else
        <h2 class="text-center">  <br><br>تم تنفيذ الطلب بنجاح<i class="fas fa-check"></i><br>
           سوف نتواصل معك قريبا <br> شكراااا لك  <br> <br></h2>
        @endif
</div>
</div>
<br>
<br>








@endsection
