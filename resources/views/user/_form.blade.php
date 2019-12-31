<!-- Name Form Input -->
<div class="form-group ">
    <label  for="filter">@lang('lang.special')</label>
    <select id="filter" name="special" class="form-control" style="height: 46px; width: 70%">
        <option value="Supplier" >@lang('lang.Supplier')</option>
        <option value="Shipping" >@lang('lang.shippingcompany')</option>
        <option value="Center" >@lang('lang.maintenanceCenter')</option>
    </select>
</div>
<div class="form-group col-lg-12">
</div>
<div class="form-group  @if ($errors->has('companyName')) has-error @endif">
    {!! Form::label('name', __('lang.companyName')) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('lang.companyName')]) !!}
    @if ($errors->has('companyName')) <p class="help-block">{{ $errors->first('companyName') }}</p> @endif
</div>
<!-- email Form Input -->
<div class="form-group @if ($errors->has('email')) has-error @endif">
    {!! Form::label('email', __('lang.email')) !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('lang.email')]) !!}
    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
</div>
<div class="form-group   @if ($errors->has('mobile')) has-error @endif">
    {!! Form::label('mobile', __('lang.mobile')) !!}
    {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => __('lang.mobile')]) !!}
    @if ($errors->has('mobile')) <p class="help-block">{{ $errors->first('mobile') }}</p> @endif
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
<div class="form-group   @if ($errors->has('address')) has-error @endif">
    {!! Form::label('address', __('lang.address')) !!}
    {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => __('lang.address')]) !!}
    @if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
</div>
<div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">
    {!! Form::label('address', __('lang.logo')) !!}
    {!! Form::file('logo', null, ['class' => 'form-control', 'placeholder' => __('lang.logo')]) !!}
{{--     <img class="card-img-top" src="{{logo }} " style="width:150px;height:150px;" >--}}
    @if ($errors->has('logo')) <p class="help-block">{{ $errors->first('logo') }}</p> @endif
</div>

<!-- password Form Input -->
<div class="form-group  @if ($errors->has('password')) has-error @endif">
    {!! Form::label('password', __('lang.password')) !!}
    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => __('lang.password')]) !!}
    @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
</div>

<!-- Roles Form Input -->
<div class="form-group @if ($errors->has('roles')) has-error @endif">
    {!! Form::label('roles[]', __('lang.roles')) !!}
    {!! Form::select('roles[]', $roles, isset($user) ? $user->roles->pluck('id')->toArray() : null,  ['class' => 'form-control', 'multiple']) !!}
    @if ($errors->has('roles')) <p class="help-block">{{ $errors->first('roles') }}</p> @endif
</div>

<!-- Permission -->
@if(isset($user))
    @include('shared._permissions', ['closed' => 'true', 'model' => $user ])
@endif
