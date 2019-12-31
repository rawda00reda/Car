@extends('admin.layouts.app')
@section('title', __('lang.branch'))
@section('sitetitle', __('lang.branch'))
@section('branch', 'active ')
@section('content')
<section class="content">
    <div id="flash-msg">
        @include('flash::message')
    </div>
    @include('messages')
    <div class="box-default color-palette-box">
        <div class="box">
            @can('Add_Branch')
                <div class="box-header with-border">
                    <a href="{{ route('branch.create') }}" type="button" class="btn btn-info pull-right">
                        @lang('lang.Add') @lang('lang.branch')
                    </a>
                </div>
        @endcan
        <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <th style="width: 3%">@lang('lang.ID')</th>
                            <th style="width: 15%">@lang('lang.branch')</th>
                            <th style="width: 15%">@lang('lang.created')</th>
                            <th style="width: 20%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($branchs) > 0)
                            @foreach($branchs as $branch)
                                <tr>
                                    <td>{{$branch->id}}</td>
                                    @if ( app()->getLocale() == 'ar' )
                                    <td>{{$branch->titleAr}}</td>
                                    @endif
                                    @if ( app()->getLocale() == 'en' )
                                        <td>{{$branch->titleEn}}</td>
                                    @endif
                                    @if ( app()->getLocale() == 'ur' )
                                        <td>{{$branch->titleUr}}</td>
                                    @endif
                                    <td>{{ $branch->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        @can('Edit_Branch')
                                            <a href="branch/{{ $branch->id}}/edit" type="button" class="btn btn-info">@lang('lang.Edit')</a>
                                        <a class="btn">
                                            @endcan
                                            @can('Delete_Branch')
                                            <form action="{{action('BranchController@destroy', $branch->id)}}" method="post">
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
