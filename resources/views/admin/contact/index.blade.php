@extends('admin.layouts.app')
@section('title', __('lang.special'))
@section('sitetitle', __('lang.special'))
@section('special', 'active ')
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
                        @lang('lang.Add')
                    </a>
                </div>


    <div class="box-body ">
        <div class="row">
            <div class="box-body col-lg-12">

                <table class="table table-striped table-light text-center">
                    <thead>
                    <tr>
                        <th scope="col">@lang('lang.ID')</th>
                        <th scope="col">@lang('lang.phone')</th>
                        <th scope="col">@lang('lang.email')</th>
                        <th scope="col">@lang('lang.address')</th>





                        <th scope="col">@lang('lang.operation')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($contacts) > 0)
                        @foreach($contacts as $contact)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td width="30%">{{$contact->phone}}</td>


                                <td width="30%">

                                    {{$contact->email}}

                                </td>

                                       <td>    {{$contact->address}}
                                       </td>

                                <td>
                                    <a class="btn">
                                        <a href="contact/{{ $contact->id}}/edit" type="button" class="btn btn-info">@lang('lang.Edit')</a>
                                        <a class="btn">

                                            <form action="{{action('ContactController@destroy', $contact->id)}}" method="post">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button  type="submit" class="btn btn-danger">@lang('lang.Delete')</button >
                                                @csrf
                                            </form>

                                        </a>
                                    </a>


{{--                                    <a class="btn">--}}
{{--                                        <form action="{{action('ContactController@destroy', $contact['id'])}}" method="post">--}}
{{--                                            {{csrf_field()}}--}}
{{--                                            <input name="_method" type="hidden" value="DELETE">--}}
{{--                                            <button type="submit" class="btn" style="color: darkred;font-size:20px "><i class="far fa-trash-alt"></i></button>--}}
{{--                                        </form>--}}
{{--                                    </a>--}}

{{--                                    <button type="button" class="btn" style="color: #0d6aad ; font-size: 20px" >--}}
{{--                                        <a href="contact/{{$contact->id}}/edit">                                                <i class="far fa-edit"></i>--}}
{{--                                        </a>--}}
{{--                                    </button>--}}







                                </td>
                            </tr>

                        @endforeach
                    @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>


            <!-- Add Modal-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">@lang('lang.contact')</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form  method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/admin/contact')}}" enctype="multipart/form-data" >
                                <div class="modal-body">
                                    @csrf
                                    <div class="box-body col-md-10 col-sm-offset-1">

                                        <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                            <label for="phone">@lang('lang.phone')</label>
                                            <input type="number" id="phone" name="phone" class="form-control" value="{!! old('phone') !!}" />
                                            <span class="help-block">{{ $errors->first('phone', ':message') }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email">@lang('lang.email')</label>
                                            <input type="email" id="email" name="email" class="form-control" value="{!! old('email') !!}" />
                                            <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                                        </div>

                                        <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }} ">
                                            <label for="titleAr">@lang('lang.address')</label>
                                            <input type="text" id="address" name="address" class="form-control"  value="{!! old('address') !!}" />
                                            <span class="help-block">{{ $errors->first('address', ':message') }}</span>
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
    </section>
    @endsection
