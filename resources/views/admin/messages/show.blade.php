@extends('admin.layouts.app')
@section('title', 'Messages')
@section('sitetitle', 'Dashboard | Show Messages')
@section('messages', 'active')
@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Read Message</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3>Message Subject : {{ $message->subject}}</h3>
                <h5>From: {{ $message->email}}
                  <span class="mailbox-read-time pull-right">{{ $message->created_at->diffForHumans()}}</span></h5>
              </div>
              <div class="mailbox-read-message">
                {{ $message->message}}
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <div class="box-footer">
              <div class="pull-right">
                <a href="/admin/messages"><button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Back</button></a>
              </div>
              
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@stop