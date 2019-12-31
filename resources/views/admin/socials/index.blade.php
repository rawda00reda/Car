@extends('admin.layouts.app')
@section('title', __('lang.social'))
@section('sitetitle', __('lang.social'))
@section('social', 'active ')
@section('content')
    <section class="content">
        <div id="flash-msg">
            @include('flash::message')
        </div>
        @include('messages')
        <div class="box-default color-palette-box">
            <div class="box"><!-- Button trigger modal -->

                <div class="box-header with-border">
                    <a  type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#exampleModal">
                        @lang('lang.Add') @lang('lang.socials')
                    </a>
                </div>
    <div class="box-body ">
        <div class="row">
            <div class="box-body col-lg-12">

                <table class="table table-striped table-light text-center">
                    <thead>
                    <tr>
                        <th scope="col">@lang('lang.ID')</th>
                        <th scope="col" width="20%">@lang('lang.icon')</th>
                        <th scope="col">@lang('lang.link')</th>
                        <th style="width: 20%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($socials) > 0)
                        @foreach($socials as $social)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td width="40%">{{$social->name}}</td>



                                <td width="30%">

                               {{$social->link}}

                                </td>




                                <td>


{{--                                    <a class="btn">--}}
{{--                                        <form action="{{action('SocialController@destroy', $social['id'])}}" method="post">--}}
{{--                                            {{csrf_field()}}--}}
{{--                                            <input name="_method" type="hidden" value="DELETE">--}}
{{--                                            <button type="submit" class="btn" style="color: darkred;font-size:20px "><i class="far fa-trash-alt"></i></button>--}}
{{--                                        </form>--}}
{{--                                    </a>--}}

{{--                                    <button type="button" class="btn" style="color: #0d6aad ; font-size: 20px" >--}}
{{--                                        <a href="socials/{{$social->id}}/edit">                                                <i class="far fa-edit"></i>--}}
{{--                                        </a>--}}
{{--                                    </button>--}}

                                    <a class="btn">
                                        <a href="socials/{{ $social->id}}/edit" type="button" class="btn btn-info">@lang('lang.Edit')</a>
                                        <a class="btn">

                                            <form action="{{action('SocialController@destroy', $social->id)}}" method="post">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button  type="submit" class="btn btn-danger">@lang('lang.Delete')</button >
                                                @csrf
                                            </form>

                                        </a>
                                    </a>

                                </td>
                            </tr>

                        @endforeach
                    @endif
                    </tbody>
                </table>

            </div>
        </div>

        <!-- Add Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('lang.socials')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form  method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/admin/socials')}}" enctype="multipart/form-data" >
                            <div class="modal-body">
                                @csrf
                                <div class="box-body col-md-10 col-sm-offset-1">


                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name">@lang('lang.name')</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{!! old('name') !!}" />
                                        <span class="help-block">{{ $errors->first('name', ':message') }}</span>
                                    </div>

                                    <div class="form-group {{ $errors->has('link') ? ' has-error' : '' }}">
                                        <label for="link">@lang('lang.link')</label>
                                        <input type="text" id="link" name="link" class="form-control" value="{!! old('link') !!}" />
                                        <span class="help-block">{{ $errors->first('link', ':message') }}</span>
                                    </div>











                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.cancel')</button>
                                <button type="submit" class="btn btn-primary"> @lang('lang.save')</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Add Modal-->
    </div>
    </div>

</section>
@stop
