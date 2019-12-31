@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
<section class="content">
    <div id="flash-msg">
        @include('flash::message')
    </div>
    @include('messages')
    <div class="box-default color-palette-box">
        <div class="box">
            @can('add_product')
            <div class="box-header with-border">
                <a href="/admin/more/{{$id}}/find/create" type="button" class="btn btn-info pull-right">@lang('lang.AddProduct')</a>
            </div>
            @endcan
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th style="width: 5%">@lang('lang.ID')</th>
                        <th style="width: 25%">@lang('lang.stock')</th>
                        <th style="width: 15%">@lang('lang.color')</th>
                        <th style="width: 25%">@lang('lang.Image')</th>
                        <th style="width: 20%"></th>
                    </tr>
                    </thead>
                    <tbody>
                @foreach($productss as $products)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $products->stock }}</td>
                            <th>  <input type="color" id="color" name="color" style="width: 200px;" class="form-control" value="{{ $products->color }}" />
                            <td> <img class="card-img-top" src="{{ asset('images/products/' . $products->img) }} " style="width: 50px;height: 50px;" >
                            </td>
                            <td>
                                @can('delete_product')
                                <a class="btn">
                                <form method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/admin/more/'.$id .'/find',$products->id)}}"  enctype="multipart/form-data">
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
