@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box-default color-palette-box">
            <div class="box">
                @can('Add_City')
                <div class="box-header with-border">
                    <a href="/admin/city/create" type="button" class="btn btn-info pull-right">@lang('lang.Addcity')</a>
                </div>
                @endcan
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="#example1" class="table table-bordered table-hover text-center">

                        <tbody>
                        <tr>
                            <th style="width: 5%">@lang('lang.ID')</th>
                            <th style="width: 15%">@lang('lang.cityAr')</th>
                            <th style="width: 15%">@lang('lang.cityEn')</th>
                            <th style="width: 15%">@lang('lang.cityUr')</th>

                        </tr>

                        @foreach($cities as $city)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $city->cityAr}}</td>
                                <td>{{ $city->cityEn}}</td>
                                <td>{{ $city->cityUr}}</td>

                                <td>
                                    @can('Edit_City')
                                    <a href="city/{{ $city->id}}/edit" type="button" class="btn btn-info">@lang('lang.Edit')</a>
                                   @endcan
                                    @can('Delete_City')
                                    <a class="btn">
                                        <form action="{{action('CityController@destroy', $city->id)}}" method="post">
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


                </div>
            </div>
            <!-- /.box -->
        </div>
    </section>
@endsection
