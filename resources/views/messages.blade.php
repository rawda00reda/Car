@if(session('success'))
    <div class="pad no-print" >
        <div class="alert alert-success alert-dismissible" style=" text-align:center ;    color: #155724;
    background-color: #9ecb98;
     !important">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check" ></i> @lang('lang.success')</h4>
            <p id="su">{{session('success')}}</p>
        </div>
    </div>
@endif


@if(session('danger'))
    <div class="pad no-print">
        <div class="alert alert-danger alert-dismissible" style="text-align: center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check" style="text-align: center"></i>@lang('lang.errorss')</h4>
            <p id="su">{{session('danger')}}</p>
        </div>
    </div>
@endif
