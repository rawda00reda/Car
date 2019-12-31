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
            @can('Add_Cc')
                <div class="box-header with-border">
                    <a href="{{ route('cc.create') }}" type="button" class="btn btn-info pull-right">
                        @lang('lang.Add') @lang('lang.cc')
                    </a>
                </div>
        @endcan
        <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <th style="width: 3%">@lang('lang.ID')</th>
                            <th style="width: 15%">@lang('lang.cc')</th>
                            <th style="width: 15%">@lang('lang.created')</th>
                            <th style="width: 20%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($ccs) > 0)
                            @foreach($ccs as $cc)
                                <tr>
                                    <td>{{$cc->id}}</td>
                                    <td>{{$cc->cc}}</td>

                                    <td>{{ $cc->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        @can('Edit_Cc')
                                            <a href="cc/{{ $cc->id}}/edit" type="button" class="btn btn-info">@lang('lang.Edit')</a>
                                        <a class="btn">
                                            @endcan
                                            @can('Delete_Cc')
                                            <form action="{{action('CcController@destroy', $cc->id)}}" method="post">
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
