<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">@lang('lang.dashboard')</li>
            <li class="@yield('home')">
                <a href="/home">
                    <i class="fa fa-home"></i> <span>@lang('lang.Home')</span>
                </a>
            </li>
            @can(['view_supplier'])
            <li class="@yield('Suppliers')">
                <a href="/admin/Suppliers">
                    <i class="fa fa-safari"></i> <span>@lang('lang.Suppliers')</span>
                </a>
            </li>
            @endcan
            <li class="@yield('shippingCompany')">
                <a href="/admin/shipping">
                    <i class="fa fa-angellist"></i> <span>@lang('lang.shippingCompany')</span>
                </a>
            </li>

{{--            <li class="@yield('centers')">--}}
{{--                <a href="/admin/center">--}}
{{--                    <i class="fa fa-angellist"></i> <span>@lang('lang.maintenanceCenter')</span>--}}
{{--                </a>--}}
{{--            </li>--}}


        @canany(['view_roles','view_users'])
                <li class="treeview @yield('users') @yield('roles') @yield('visitors')">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>@lang('lang.users')</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('view_roles')
                            <li class="@yield('roles')"><a href="/admin/roles">
                                    <i class="fa fa-key"></i> @lang('lang.roles')</a>
                            </li>
                        @endcan
                        @can('view_users')
                            <li class="@yield('users')"><a href="/admin/users">
                                    <i class="fa fa-users"></i> @lang('lang.users')</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            {{--            @canany(['view_departments','view_centers'])--}}

{{--            <li class="@yield('About')">--}}
{{--                <a href="/admin/shipments">--}}
{{--                    <i class="fa fa-deaf"></i>--}}
{{--                    <span>@lang('lang.orders')</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="@yield('About')">--}}
{{--                <a href="/admin/shippingorders">--}}
{{--                    <i class="fa fa-gavel"></i>--}}
{{--                    <span>@lang('lang.shippingorders')</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a href="/admin/addproduct" class="nav-link">--}}
{{--                    <i class="fa fa-tags"></i>--}}
{{--                    @lang('lang.product')--}}
{{--                </a>--}}
{{--            </li>--}}
             @canany(['view_Car','View_Brand','view_ProdDate','View_CarModel','View_Cc'])
            <li class="treeview @yield('addcar') @yield('addcar')">
                <a href="#">
                    <i class="fa fa-fw fa-info-circle "></i>
                    <span>@lang('lang.addcar')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('view_Car')
                    <li class="nav-item">
                        <a href="/admin/addcar" class="nav-link">
                            <i class="fa fa-car"></i>
                            @lang('lang.addcar')
                        </a>
                    </li>
                    @endcan
                    @can('View_Brand')
                    <li class="@yield('About')">
                        <a href="/admin/brand">
                            <i class="fa fa-tag"></i>
                            <span>@lang('lang.brand')</span>
                        </a>
                    </li>
                    @endcan
                    @can('view_ProdDate')
                    <li class="@yield('About')">
                        <a href="/admin/date">
                            <i class="fa fa-calendar"></i>
                            <span>@lang('lang.date')</span>
                        </a>
                    </li>
                    @endcan
                    @can('View_CarModel')
                    <li class="@yield('About')">
                        <a href="/admin/carmodel">
                            <i class="fa fa-car"></i>
                            <span>@lang('lang.CarModel')</span>
                        </a>
                    </li>
                    @endcan
                    @can('View_Cc')
                    <li class="@yield('About')">
                        <a href="/admin/cc">
                            <i class="fa fa-sort"></i>
                            <span>@lang('lang.cc')</span>
                        </a>
                    </li>
                        @endcan
                </ul>
            </li>
            @endcanany
            @canany(['View_Department','View_Special'])
            <li class="treeview @yield('depts') @yield('depts')">
                <a href="#">
                    <i class="fa fa-fw fa-info-circle "></i>
                    <span>@lang('lang.depts')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('View_Department')
                    <li class="@yield('depts')"><a href="/admin/depts">
                            <i class="fa fa-th"></i> @lang('lang.depts')</a>
                    </li>
                    @endcan
                    @can('View_Branch')
                    <li class="@yield('abouts')"><a href="/admin/branch">
                            <i class="fa fa-fw fa-info-circle "></i>
                            @lang('lang.branch')</a>
                    </li>
                        @endcan
                        @can('View_Special')
                    <li class="@yield('abouts')"><a href="/admin/special">
                            <i class="fa fa-fw fa-envelope-square "></i>
                            @lang('lang.specials')</a>
                    </li>
                        @endcan
                        @can('View_Country')
                    <li class="@yield('About')">
                        <a href="/admin/country">
                            <i class="fa fa-address-card-o"></i>
                            <span>@lang('lang.countries')</span>
                        </a>
                    </li>
                        @endcan
                        @can('View_City')
                        <li class="@yield('About')">
                        <a href="/admin/city">
                            <i class="fa fa-address-card"></i>
                            <span>@lang('lang.cities')</span>
                        </a>
                    </li>
                            @endcan
                </ul>
            </li>
            @endcanany

            <li class="treeview @yield('website') @yield('website')">
            <li class="treeview @yield('website') @yield('website')">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>@lang('lang.website')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
            <ul class="treeview-menu">
            <li class="nav-item">
                <a href="/admin/slider" class="nav-link">
                    <i class="nav-icon fa fa-th"></i>
                    <span>
                        @lang('lang.slider')
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/services" class="nav-link">
                    <i class="fa fa-gears"></i>
                    @lang('lang.services')
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/welcome" class="nav-link">
                    <i class="fa fa-address-card-o"></i>
                    @lang('lang.WHYCHOOSEUS')
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/socials" class="nav-link"><i class="fa fa-link">
                    </i>
                    @lang('lang.socials')
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/faq" class="nav-link"> <i class="fa fa-question"></i>
                    @lang('lang.Aboutus')
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/contact" class="nav-link">
                    <i class="fa fa-phone"></i>
                    @lang('lang.contact')
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/messages" class="nav-link">
                    <i class="fa fa-envelope"></i>
                        @lang('lang.messages')
                </a>
            </li>
            </ul></li>
        </ul>
    </section>
</aside>
