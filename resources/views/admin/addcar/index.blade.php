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
                            @can('Add_Car')
                <div class="box-header with-border">
                    <a href="{{ route('addcar.create') }}" type="button" class="btn btn-info pull-right">
                        @lang('lang.Add') @lang('lang.car')
                    </a>
                </div>
                    @endcan
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <th style="width: 5%">@lang('lang.productid')</th>
                            <th style="width: 15%">@lang('lang.Image')</th>
                            <th style="width: 20%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $products)
                                <tr>
                                    <td>{{ $products->id }}</td>
                                    <td> <img class="card-img-top" src="{{ asset('images/products/' . $products->img) }} " style="width: 50px;height: 50px;" >
                                    </td>
                                    <td>
{{--                                        <a href="addcar/{{ $products->id}}/edit" type="button" class="btn btn-info">@lang('lang.Edit')</a>--}}
{{--                                        <a href="more/{{ $products->id}}/find" type="button" class="btn btn-info">@lang('lang.More')</a>--}}
                                        @can('Delete_Car')
                                        <a class="btn">
                                            <form action="{{action('AddCarController@destroy', $products['id'])}}" method="post">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button  type="submit" class="btn btn-danger">@lang('lang.Delete')</button >
                                           @csrf
                                            </form>
                                        </a>
                                            @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="box-footer clearfix">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
