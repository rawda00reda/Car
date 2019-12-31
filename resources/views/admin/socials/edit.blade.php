@extends('admin.layouts.app')
@section('title', 'Socials')
@section('sitetitle', 'Dashboard | Edit Social')
@section('Socials', 'active')
@section('content')

<section class="content">
  <div class="box box-default color-palette-box">
    <div class="box">
      <div class="box-body">
        <div class="box-header with-border">
          <form role="form" method="POST" action="{{action('SocialController@update', $social)}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input name="_method" type="hidden" value="PATCH">
             <div class="box-body">

              <div class="form-group">
                <label for="name">@lang('lang.name') :</label>
                  <input type="name" class="form-control" id="name" name="name" value="{{$social->name}}"></input>

              </div>

              <div class="form-group">
                <label for="link">@lang('lang.link') :</label>
                <input type="link" class="form-control" id="link" name="link" value="{{$social->link}}"></input>
              </div>

              <hr>

              <div class="form-group center">
                <div class="col-md-offset-2 col-md-4">
                  <a href="/admin/socials" class="btn btn-block btn-danger" role="button">Cancel</a>
                </div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-block btn-primary">Update</button>
                </div>
              </div>

              </div>
          </form>
      </div>
    </div>
</section>
@stop
