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
            @can('Add_Department')
                <div class="box-header with-border">
                    <a href="{{ route('depts.create') }}" type="button" class="btn btn-info pull-right">
                        @lang('lang.Add') @lang('lang.depts')
                    </a>
                </div>
        @endcan
        <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <th style="width: 3%">@lang('lang.ID')</th>
                            <th style="width: 15%">@lang('lang.deptname')</th>
                            <th style="width: 15%">@lang('lang.created')</th>
                            <th style="width: 20%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($depts) > 0)
                            @foreach($depts as $dept)
                                <tr>
                                    <td>{{$dept->id}}</td>
                                    @if ( app()->getLocale() == 'ar' )
                                    <td>{{$dept->titleAr}}</td>
                                    @endif
                                    @if ( app()->getLocale() == 'en' )
                                        <td>{{$dept->titleEn}}</td>
                                    @endif
                                    @if ( app()->getLocale() == 'ur' )
                                        <td>{{$dept->titleUr}}</td>
                                    @endif
                                    <td>{{ $dept->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        @can('Edit_Department')
                                            <a href="depts/{{ $dept->id}}/edit" type="button" class="btn btn-info">@lang('lang.Edit')</a>
                                        <a class="btn">
                                            @endcan
                                            @can('Delete_Department')
                                            <form action="{{action('DepartmentControl@destroy', $dept->id)}}" method="post">
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
