@extends('admin.layouts.app')
@section('title', __('lang.UT'))
@section('sitetitle', __('lang.UT'))
@section('UT', 'active ')
@section('content')
<section class="content">
    <div id="flash-msg">
        @include('flash::message')
    </div>
    @include('messages')
    <div class="box-default color-palette-box">
        <div class="box">
            @can('add_centers')
                <div class="box-header with-border">
                    <a href="{{ route('center.create') }}" type="button" class="btn btn-info pull-right">
                        @lang('lang.Add') @lang('lang.center')
                    </a>
                </div>
        @endcan
        <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <th style="width: 3%">@lang('lang.ID')</th>
                            <th style="width: 15%">@lang('lang.UT')</th>
                            <th style="width: 15%">@lang('lang.created')</th>
                            <th style="width: 20%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($centers) > 0)
                            @foreach($centers as $center)
                                <tr>
                                    <td>{{$center->id}}</td>
                                    @if ( app()->getLocale() == 'ar' )
                                    <td>{{$center->titleAr}}</td>
                                    @endif
                                    @if ( app()->getLocale() == 'en' )
                                        <td>{{$center->titleEn}}</td>
                                    @endif
                                    @if ( app()->getLocale() == 'ur' )
                                        <td>{{$center->titleUr}}</td>
                                    @endif
                                    <td>{{ $center->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        @can('edit_centers')
                                            <a href="center/{{ $center->id}}/edit" type="button" class="btn btn-info">@lang('lang.Edit')</a>
                                        <a class="btn">
                                            @endcan
                                            @can('delete_centers')
                                            <form action="{{action('TypeofCenter@destroy', $center->id)}}" method="post">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button  type="submit" class="btn btn-danger">@lang('lang.Delete')</button >
                                                @csrf
                                            </form>
                                                @endcan
                                        </a>
                                    </td>

                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
