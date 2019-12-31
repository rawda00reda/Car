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
        <div class="box">

        <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <th style="width: 3%">@lang('lang.ID')</th>
                            <th style="width: 15%">@lang('lang.name')</th>
                            <th style="width: 15%">@lang('lang.branch')</th>
                            <th style="width: 15%">@lang('lang.created')</th>

                            <th style="width: 15%">@lang('lang.owner')</th>
                            <th style="width: 15%">@lang('lang.phone')</th>
                            <th style="width: 15%">@lang('lang.employee_id')</th>

                            <th style="width: 15%">@lang('lang.special')</th>
                            <th style="width: 15%">@lang('lang.location')</th>


                            <th style="width: 20%"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(count($centers) > 0)
                            @foreach($centers as $center)
                                <tr>
                                    <td>{{$center->id}}</td>
                                    @if ( app()->getLocale() == 'ar' )
                                    <td>{{$center->name_ar}}</td>
                                    @endif
                                    @if ( app()->getLocale() == 'en' )
                                        <td>{{$center->name_en}}</td>
                                    @endif
                                    @if ( app()->getLocale() == 'ur' )
                                        <td>{{$center->name_ur}}</td>
                                    @endif

                                    <td>{{ $center->branch }}</td>

                                           <td>{{ $center->created_at->toFormattedDateString() }}</td>

                                    <td>{{$center->owner_ar}}</td>

                                    @if ( app()->getLocale() == 'en' )
                                        <td>{{$center->owner_en}}</td>
                                    @endif
                                    @if ( app()->getLocale() == 'ur' )
                                        <td>{{$center->owner_ur}}</td>
                                    @endif
                                    <td>{{ $center->phone }}</td>
                                    <td>{{$center->employee_id}}</td>





                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
