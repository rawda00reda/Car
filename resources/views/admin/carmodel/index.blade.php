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
            @can('Add_CarModel')
                <div class="box-header with-border">
                    <a href="{{ route('carmodel.create') }}" type="button" class="btn btn-info pull-right">
                        @lang('lang.Add') @lang('lang.CarModel')
                    </a>
                </div>
        @endcan
        <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <th style="width: 3%">@lang('lang.ID')</th>
                            <th style="width: 15%">@lang('lang.CarModel')</th>
                            <th style="width: 15%">@lang('lang.created')</th>
                            <th style="width: 20%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($carmodels) > 0)
                            @foreach($carmodels as $carmodel)
                                <tr>
                                    <td>{{$carmodel->id}}</td>
                                    @if ( app()->getLocale() == 'ar' )
                                    <td>{{$carmodel->titleAr}}</td>
                                    @endif
                                    @if ( app()->getLocale() == 'en' )
                                        <td>{{$carmodel->titleEn}}</td>
                                    @endif
                                    @if ( app()->getLocale() == 'ur' )
                                        <td>{{$carmodel->titleUr}}</td>
                                    @endif
                                    <td>{{ $carmodel->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        @can('Edit_CarModel')
                                            <a href="carmodel/{{ $carmodel->id}}/edit" type="button" class="btn btn-info">@lang('lang.Edit')</a>
                                        <a class="btn">
                                            @endcan
                                            @can('Delete_CarModel')
                                            <form action="{{action('CarModelController@destroy', $carmodel->id)}}" method="post">
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
