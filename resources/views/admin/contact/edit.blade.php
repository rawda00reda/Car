@extends('admin.layouts.app')


@section('content')
    <section class="content-header">
        <h1>
            @lang('lang.contact')
        </h1>
    </section>
    <div class="box-body ">
    <form  role="form" method="POST"
          action="{{action('ContactController@update',$contact)}}"
          enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
        <div class="modal-body">
            @csrf
            @method('PUT')
        </div>
        <div class="box-body col-md-10 col-sm-offset-1">

            <div class="form-group col-lg-8 {{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone">@lang('lang.phone')</label>
                <input type="number" id="phone" name="phone" class="form-control"  value="{{$contact->phone}}" />
                <span class="help-block">{{ $errors->first('phone', ':message') }}</span>
            </div>

            <div class="form-group col-lg-8 {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">@lang('lang.email')</label>
                <input type="email" id="email" name="email" class="form-control"  value="{{$contact->email}}" />
                <span class="help-block">{{ $errors->first('email', ':message') }}</span>
            </div>

            <div class="form-group col-lg-8 {{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="address">@lang('lang.address')</label>
                <input type="text" id="address" name="address" class="form-control"  value="{{$contact->address}}" />
                <span class="help-block">{{ $errors->first('address', ':message') }}</span>
            </div>










        </div>
        <div class="modal-footer">
            <div class="box-body col-md-10 col-sm-offset-1">
                <a href="/admin/contact" type="button" class="btn btn-default pull-left"
                        data-dismiss="modal">@lang('lang.cancel')</a>
                <button type="submit" class="btn btn-primary">@lang('lang.Update')</button>
            </div>
        </div>
    </form>
    </div>

    @endsection

