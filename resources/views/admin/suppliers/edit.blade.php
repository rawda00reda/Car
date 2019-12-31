@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <div id="flash-msg">
        @include('flash::message')
    </div>
    @include('messages')
    <section class="content">
        <div class="box box-default color-palette-box ">
            <div class="box-header with-border">
                <h3 class="box-title">
                    @lang('lang.Update') @lang('lang.PD')
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

          <form method="POST"  action="{{action('Suppliers@update', $user->id)}}" enctype="multipart/form-data">
              <input name="_method" type="hidden" value="PATCH">
              {{ csrf_field() }}
              @csrf
              <div class="box-body col-md-10 col-sm-offset-1">
                  <!-- Name Form Input -->
                  <div class="form-group ">
                      <label  for="filter">@lang('lang.special')</label>
                      <select id="filter" name="special" class="form-control" style="height: 46px; width: 70%">
                          <option value="Supplier" >@lang('lang.Supplier')</option>
                          <option value="Shipping" >@lang('lang.shippingcompany')</option>
                          <option value="Center" >@lang('lang.maintenanceCenter')</option>
                      </select>
                  </div>

                  <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
                      <label>@lang('lang.companyName')</label>
                      <input type="text" name="name" class="form-control" value="{{$user->name}}">
                      @if ($errors->has('name'))
                          <span class="help-block ">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                      @endif
                  </div>
                  <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                      <label>Email Address</label>
                      <input type="email" name="email" class="form-control" value="{{$user->email}}">
                      @if ($errors->has('email'))
                          <span class="help-block ">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                      @endif
                  </div>
                  <div class="form-group has-feedback {{ $errors->has('mobile') ? ' has-error' : '' }}">
                      <label>@lang('lang.mobile')</label>
                      <input type="text" name="mobile" class="form-control" value="{{$user->mobile}}">
                      @if ($errors->has('mobile'))
                          <span class="help-block ">
                                     <strong>{{ $errors->first('mobile') }}</strong>
                                </span>
                      @endif
                  </div>

                  <div class="form-group ">
                      <label  for="filter">@lang('lang.country')</label>
                      <select id="filter" name="country" class="form-control" style="height: 46px; width: 70%">
                          @foreach($countries as $countrie)
                              @if ( app()->getLocale() == 'en' )
                                  <option value="{{$countrie->id}}" >{{$countrie->countryEn}}</option>
                              @elseif ( app()->getLocale() == 'ar' )
                                  <option value="{{$countrie->id}}" >{{$countrie->countryAr}}</option>
                              @else
                                  <option value="{{$countrie->id}}" >{{$countrie->countryUr}}</option>
                              @endif
                          @endforeach

                      </select>
                  </div>
                  <div class="form-group ">
                      <label  for="filter">@lang('lang.city')</label>
                      <select id="filter" name="city" class="form-control" style="height: 46px; width: 70%">
                          @foreach($citys as $city)
                              @if ( app()->getLocale() == 'en' )
                                  <option value="{{$city->id}}" >{{$city->cityEn}}</option>
                              @elseif ( app()->getLocale() == 'ar' )
                                  <option value="{{$city->id}}" >{{$city->cityAr}}</option>
                              @else
                                  <option value="{{$city->id}}" >{{$city->cityUr}}</option>
                              @endif
                          @endforeach

                      </select>
                  </div>
                  <div class="form-group has-feedback {{ $errors->has('address') ? ' has-error' : '' }}">
                      <label>@lang('lang.address')</label>
                      <input type="text" name="address" class="form-control" value="{{$user->address}}">
                      @if ($errors->has('address'))
                          <span class="help-block ">
                                     <strong>{{ $errors->first('address') }}</strong>
                                </span>
                      @endif
                  </div>

                  <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">
                      <label for="img">@lang('lang.logo')</label>
                      <input type="file"  name="logo" multiple class="form-control-file" id="logo" aria-describedby="fileHelp">
                      <img class="card-img-top" src="{{ asset('images/'.$user->logo ) }} " style="width:150px;height:150px;" >
                      <span class="help-block">{{ $errors->first('logo', ':message') }}</span>
                  </div>
                  <!-- password Form Input -->
                  <div class="form-group  @if ($errors->has('password')) has-error @endif">
                      {!! Form::label('password', __('lang.password')) !!}
                      {!! Form::password('password', ['class' => 'form-control', 'placeholder' => __('lang.password')]) !!}
                      @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                  </div>
              </div>
              <hr>
              <div class="form-group center">
                  @can(['edit_personalData'])

                  <div class="col-md-offset-2 col-md-4">
                      <a href="/admin/supplier" class="btn btn-block btn-danger" role="button">@lang('lang.Cancel')</a>
                  </div>
                  <div class="col-md-4">
                      <button type="submit" class="btn btn-block btn-primary">@lang('lang.update')</button>
                  </div>
                      @endcan
              </div>
          </form>
            </div>
        </div>
    </section>
@endsection
