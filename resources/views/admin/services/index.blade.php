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
                        @lang('lang.Add') @lang('lang.services')
                    </a>
                </div>


    <div class="box-body ">
        <div class="row">
            <div class="box-body col-lg-12">

                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th scope="col">@lang('lang.ID')</th>
                        <th scope="col">@lang('lang.title')</th>
                        <th scope="col">@lang('lang.body')</th>


                        <th scope="col">@lang('lang.img')</th>

                        <th style="width: 20%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($services) > 0)
                        @foreach($services as $service)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td >
                                    @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                        {{$service->title_ar}}
                                    @endif

                                    @if (LaravelLocalization::getCurrentLocale() == 'en')
                                        {{$service->title_en}}
                                    @endif</td>

                                @if (LaravelLocalization::getCurrentLocale() == 'ur')
                                {{$service->titlze_ur}}
                                @endif

                                <td >

                                    @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                    {{substr($service->body_ar,0,100)}}
                                        @endif

                                        @if (LaravelLocalization::getCurrentLocale() == 'en')
                                            {{substr($service->body_en,0,100)}}

                                        @endif
                                        @if (LaravelLocalization::getCurrentLocale() == 'ur')
                                            {{substr($service->body_ur,0,100)}}
                                        @endif


                                </td>



                                <td>  <img class="img-responsive" src="{{asset('images/services/'.$service->img)}}" style="width:70px;height:70px; border-radius: 50% "></td>
                                <td>

                                    <a class="btn">
                                        <a href="services/{{ $service->id}}/edit" type="button" class="btn btn-info">@lang('lang.Edit')</a>
                                        <a class="btn">

                                            <form action="{{action('ServiceController@destroy', $service->id)}}" method="post">
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
    </div>



            <!-- Add Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">@lang('lang.services')</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form  method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/admin/services')}}" enctype="multipart/form-data" >
                                <div class="modal-body">
                                    @csrf
                                    <div class="box-body col-md-10 col-sm-offset-1">

                                        <div class="form-group {{ $errors->has('title_ar') ? ' has-error' : '' }}">
                                            <label for="title_ar">@lang('lang.title_ar')</label>
                                            <input type="text" id="title_ar" name="title_ar" class="form-control" value="{!! old('title_ar') !!}" />
                                            <span class="help-block">{{ $errors->first('title_ar', ':message') }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('title_en') ? ' has-error' : '' }}">
                                            <label for="title_en">@lang('lang.title_en')</label>
                                            <input type="text" id="title_en" name="title_en" class="form-control" value="{!! old('title_en') !!}" />
                                            <span class="help-block">{{ $errors->first('title_en', ':message') }}</span>
                                        </div>

                                        <div class="form-group {{ $errors->has('title_ur') ? ' has-error' : '' }} ">
                                            <label for="titleAr">@lang('lang.title_ur')</label>
                                            <input type="text" id="title_ur" name="title_ur" class="form-control"  value="{!! old('title_ur') !!}" />
                                            <span class="help-block">{{ $errors->first('title_ur', ':message') }}</span>
                                        </div>



                                        <div class="form-group {{ $errors->has('body_ar') ? ' has-error' : '' }}">
                                            <label for="bodyAr">@lang('lang.body_ar')</label>
                                            <textarea type="body" rows="5" class="form-control"  name="body_ar"> </textarea>
                                        </div>

                                        <div class="form-group {{ $errors->has('body_en') ? ' has-error' : '' }}">
                                            <label for="body_en">@lang('lang.body_en')</label>
                                            <textarea type="body" rows="5" class="form-control"  name="body_en"> </textarea>
                                        </div>

                                        <div class="form-group {{ $errors->has('body_ur') ? ' has-error' : '' }}">
                                            <label for="body_ur">@lang('lang.body_ur')</label>
                                            <textarea type="body" rows="5" class="form-control"  name="body_ur"> </textarea>
                                        </div>



                                        <div class="box-body">
                                            <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }}">
                                                <label for="image">@lang('lang.img')</label>
                                                <input type="file" name="img" multiple class="form-control-file" id="img"
                                                       aria-describedby="fileHelp">
                                                <span class="help-block">{{ $errors->first('img', ':message') }}</span>
                                            </div>
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
