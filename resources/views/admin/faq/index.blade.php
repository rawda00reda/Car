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

                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th scope="col">@lang('lang.ID')</th>
                        <th scope="col">@lang('lang.title')</th>
                        <th scope="col">@lang('lang.content')</th>
                        <th style="width: 20%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($faqs) > 0)
                        @foreach($faqs as $faq)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th >
                                    @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                        {{$faq->qus_ar}}
                                    @endif
                                    @if (LaravelLocalization::getCurrentLocale() == 'en')
                                        {{$faq->qus_en}}
                                    @endif
                                        @if (LaravelLocalization::getCurrentLocale() == 'ur')
                                            {{$faq->qus_ur}}
                                        @endif
                                </th>
                                <th>
                                    @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                        {{$faq->body_ar}}
                                        @endif

                                        @if (LaravelLocalization::getCurrentLocale() == 'en')
                                            {{$faq->body_en}}

                                        @endif
                                        @if (LaravelLocalization::getCurrentLocale() == 'ur')
                                            {{$faq->body_ur}}
                                        @endif
                                </th>
                                <th>

                                    <a class="btn">
                                        <a href="faq/{{ $faq->id}}/edit" type="button" class="btn btn-info">@lang('lang.Edit')</a>
                                        <a class="btn">

                                            <form action="{{action('FaqController@destroy', $faq->id)}}" method="post">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button  type="submit" class="btn btn-danger">@lang('lang.Delete')</button >
                                                @csrf
                                            </form>

                                        </a>
                                    </a>
                                </th>
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
                            <h5 class="modal-title" id="exampleModalLabel">@lang('lang.services')</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form  method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/admin/faq')}}" enctype="multipart/form-data" >
                                <div class="modal-body">
                                    @csrf
                                    <div class="box-body col-md-10 col-sm-offset-1">

                                        <div class="form-group {{ $errors->has('qus_ar') ? ' has-error' : '' }}">
                                            <label for="qus_ar">@lang('lang.titleAr')</label>
                                            <input type="text" id="qus_ar" name="qus_ar" class="form-control" value="{!! old('qus_ar') !!}" />
                                            <span class="help-block">{{ $errors->first('qus_ar', ':message') }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('qus_en') ? ' has-error' : '' }}">
                                            <label for="qus_en">@lang('lang.titleEn')</label>
                                            <input type="text" id="qus_en" name="qus_en" class="form-control" value="{!! old('qus_en') !!}" />
                                            <span class="help-block">{{ $errors->first('qus_en', ':message') }}</span>
                                        </div>

                                        <div class="form-group {{ $errors->has('qus_ur') ? ' has-error' : '' }} ">
                                            <label for="titleAr">@lang('lang.qus_ur')</label>
                                            <input type="text" id="qus_ur" name="titleUr" class="form-control"  value="{!! old('qus_ur') !!}" />
                                            <span class="help-block">{{ $errors->first('qus_ur', ':message') }}</span>
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
    @endsection
