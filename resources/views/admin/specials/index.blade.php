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
            @can('Add_Special')
                <div class="box-header with-border">
                    <a href="{{ route('special.create') }}" type="button" class="btn btn-info pull-right">
                        @lang('lang.Add') @lang('lang.special')
                    </a>
                </div>
        @endcan
        <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <th style="width: 3%">@lang('lang.ID')</th>
                            <th style="width: 15%">@lang('lang.specialname')</th>
                            <th style="width: 15%">@lang('lang.created')</th>
                            <th style="width: 20%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($specials) > 0)
                            @foreach($specials as $special)
                                <tr>
                                    <td>{{$special->id}}</td>
                                    @if ( app()->getLocale() == 'ar' )
                                    <td>{{$special->titleAr}}</td>
                                    @endif
                                    @if ( app()->getLocale() == 'en' )
                                        <td>{{$special->titleEn}}</td>
                                    @endif
                                    @if ( app()->getLocale() == 'ur' )
                                        <td>{{$special->titleUr}}</td>
                                    @endif
                                    <td>{{ $special->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        @can('Edit_Special')
                                            <a href="special/{{ $special->id}}/edit" type="button" class="btn btn-info">@lang('lang.Edit')</a>
                                        <a class="btn">
                                            @endcan
                                            @can('Delete_Special')
                                            <form action="{{action('SpecialController@destroy', $special->id)}}" method="post">
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
