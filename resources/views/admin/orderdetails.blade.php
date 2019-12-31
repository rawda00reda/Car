@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box box-default color-palette-box ">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('lang.ordertDetails')</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <form method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/admin/ship/'.$order->id)}}"  enctype="multipart/form-data">
                {{ csrf_field() }}

                    @csrf
    <div class="box-body col-lg-3 ">
        <div class="form-group  col-lg-10 {{ $errors->has('productid') ? ' has-error' : '' }}">
            <label for="productid">@lang('lang.productid')</label>
            <input type="text" id="productid" name="product_id" class="form-control"  value="{{$order->product_id}}" />
            <span class="help-block">{{ $errors->first('productid', ':message') }}</span>
        </div>

    </div>
   <div class="box-body col-lg-3 ">
       <div class="form-group  {{ $errors->has('pname') ? ' has-error' : '' }}">
           <label for="pname">@lang('lang.pname')</label>
           <input type="text" id="pname" name="product_id" class="form-control"  value="{{$order->product_name}}" />
           <span class="help-block">{{ $errors->first('pname', ':message') }}</span>
       </div>
   </div>
   <div class="form-group col-lg-2 {{ $errors->has('color') ? ' has-error' : '' }}">
       <label for="titleEn">@lang('lang.color')</label>
       <input  type="color" id="color" name="color" style="width: 50px; border-radius: 50%" class="form-control" value="{{$order->color}}" />
       <span class="help-block">{{ $errors->first('color', ':message') }}</span>
   </div>
   <div class="form-group col-lg-3 {{ $errors->has('stock') ? ' has-error' : '' }}">
       <span style="font-weight: bold;  text-align: center; ">@lang('lang.amount')</span>
       <input type="text" name="stock" class="form-control" value="{{$order->amount	}}" style="height: 46px; width: 50%;" />
       <span class="help-block">{{ $errors->first('stock', ':message') }}</span>
   </div>
   <div class="form-group col-lg-3 {{ $errors->has('stock') ? ' has-error' : '' }}">
   </div>
   <div class="form-group  col-lg-4 {{ $errors->has('priceB') ? ' has-error' : '' }}">
       <label for="price">@lang('lang.priceB')</label>
       <input type="text" min="1" name="priceB" class="form-control" value="{{$order->priceB}}" style="height: 46px;width: 70%" />
       <span class="input-group-addon" style="width: 50%">SR </span>
       <span class="help-block">{{ $errors->first('price', ':message') }}</span>
   </div>
   <div class="form-group  col-lg-4 {{ $errors->has('priceA') ? ' has-error' : '' }}">
       <label for="price">@lang('lang.priceA')</label>
       <input type="number" min="1" name="priceA" class="form-control" value="{{$order->priceA}}" style="height: 46px;width: 70%"/>
       <span class="input-group-addon" style="width: 50%">SR  </span>
       <span class="help-block">{{ $errors->first('price', ':message') }}</span>
   </div>
   <div class="form-group  col-lg-3 {{ $errors->has('date') ? ' has-error' : '' }}">
        <label for="date">@lang('lang.date')</label>
        <input type="text"  name="date" class="form-control" value="{{$order->created_at}}" style="height: 46px;width: 70%"/>
        <span class="help-block">{{ $errors->first('date', ':message') }}</span>
    </div>
   <div class="form-group col-lg-10 {{ $errors->has('stock') ? ' has-error' : '' }}">
     </div>
    <div class="form-group  col-lg-3 {{ $errors->has('subtotal') ? ' has-error' : '' }}">
        <label for="date">@lang('lang.subtotal')</label>
        <input type="text"  name="subtotal" class="form-control" value="{{$order->subtotal}}" style="height: 46px;width: 50%"/>
        <span class="input-group-addon" style="width: 50%">SR  </span>
        <span class="help-block">{{ $errors->first('subtotal', ':message') }}</span>
    </div>
   <div class="form-group  col-lg-3 {{ $errors->has('taxs') ? ' has-error' : '' }}">
       <label for="date">@lang('lang.taxs')</label>
       <input type="text"  name="taxs" class="form-control" value="{{$order->taxs}}" style="height: 46px;width: 50%"/>
       <span class="input-group-addon" style="width: 50%">SR  </span>
       <span class="help-block">{{ $errors->first('total', ':message') }}</span>
   </div>
   <div class="form-group  col-lg-3 {{ $errors->has('total') ? ' has-error' : '' }}">
       <label for="date">@lang('lang.totalPrice')</label>
       <input type="text"  name="total" class="form-control" value="{{$order->total}}" style="height: 46px;width: 50%"/>
       <span class="input-group-addon" style="width: 50%">SR  </span>
       <span class="help-block">{{ $errors->first('total', ':message') }}</span>
   </div>
                    <div class="form-group col-lg-4" >
                    </div>
                   @can('acceptNewOrder')
        <div class="form-group col-lg-5" >
       <label  for="filter" style="text-align: center">@lang('lang.shippingCompany')</label>
       <select id="filter" name="shippingName" class="form-control" style="height: 46px; width: 70%">
           @foreach ($Shippings as $Shipping)
               <option value="{{ $Shipping->name }}" >{{ $Shipping->name }}</option>
           @endforeach
       </select>
   </div><hr>
         <div class="form-group center">
       <div class="col-md-offset-2 col-md-8">
           <button type="submit" class="btn btn-block btn-primary">@lang('lang.shipping')</button>
       </div>

   </div>
                       @endcan
                </form>
            </div></div>
    </section>
@endsection
