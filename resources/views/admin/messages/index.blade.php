@extends('admin.layouts.app')

@section('content')

<section class="content">
  <!-- COLOR PALETTE -->
  <div class="box box-default color-palette-box">
    <div class="box">
      <!-- /.box-header -->
      <div class="box-body">
        <ul class="timeline timeline-inverse">

              @foreach($messages as $message)
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-{{ $message->read === 1 ? "envelope-open bg-green" : "envelope-o bg-blue" }}"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> {{ $message->created_at->diffForHumans()}}</span>

                      <h3 class="timeline-header"><a href="{{ $message->email}}">{{$message->name}} </a> sent a message <a href="messages/{{ $message->id}}">{{ $message->subject}}</a></h3>

                      <div class="timeline-body">
                        {{substr ($message->message, 0, 250)}} ...
                      </div>
                      <div class="timeline-footer">
                        <a href="messages/{{ $message->id}}" class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn">
                      <form action="{{action('MessageController@destroy', $message['id'])}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button  type="submit" class="btn btn-danger btn-xs">Delete</button >
                      </form></a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
              @endforeach

              <li>
                <i class="fa fa-envelope bg-gray"></i>
              </li>
            </ul>
      </div>
    </div>
    <!-- /.box -->
  </div>
  <!-- /.box -->
</section>

@stop
