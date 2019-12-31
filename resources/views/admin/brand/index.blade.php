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
            @can('Add_Brand')
                <div class="box-header with-border">
                    <a href="{{ route('brand.create') }}" type="button" class="btn btn-info pull-right">
                        @lang('lang.Add') @lang('lang.brand')
                    </a>
                </div>
        @endcan
        <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <th style="width: 3%">@lang('lang.ID')</th>
                            <th style="width: 15%">@lang('lang.brand')</th>
                            <th style="width: 15%">@lang('lang.created')</th>
                            <th style="width: 20%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($brands) > 0)
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{$brand->id}}</td>
                                    @if ( app()->getLocale() == 'ar' )
                                    <td>{{$brand->titleAr}}</td>
                                    @endif
                                    @if ( app()->getLocale() == 'en' )
                                        <td>{{$brand->titleEn}}</td>
                                    @endif
                                    @if ( app()->getLocale() == 'ur' )
                                        <td>{{$brand->titleUr}}</td>
                                    @endif
                                    <td>{{ $brand->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        @can('Edit_Brand')
                                            <a href="brand/{{ $brand->id}}/edit" type="button" class="btn btn-info">@lang('lang.Edit')</a>
                                        <a class="btn">
                                            @endcan
                                            @can('Delete_Brand')
                                            <form action="{{action('BrandController@destroy', $brand->id)}}" method="post">
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
