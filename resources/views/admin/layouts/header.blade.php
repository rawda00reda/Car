<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Car</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Car</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
{{--          @if (Auth::user()->isAdmin())--}}
{{--          <!-- Messages: style can be found in dropdown.less-->--}}
{{--          <li class="dropdown messages-menu">--}}
{{--            <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
{{--              <i class="fa fa-envelope-o"></i>--}}
{{--              <span class="label label-success">{{count($read)}}</span>--}}
{{--            </a>--}}
{{--            <ul class="dropdown-menu">--}}
{{--              <li class="header">You have {{count($read)}} messages</li>--}}
{{--              <li>--}}
{{--                <!-- inner menu: contains the actual data -->--}}
{{--                <ul class="menu">--}}
{{--                  @foreach($msgs as $msg)--}}
{{--                  <li><!-- start message -->--}}
{{--                    <a style="{{ $msg->read === 1 ? "background: #f4f4f4;" : "" }}" href="{{ url('admin/messages/'.$msg->id)}}">--}}
{{--                      <div class="pull-left">--}}
{{--                          <i class="fa fa-{{ $msg->read === 1 ? "envelope-open" : "envelope-o" }}"></i>--}}
{{--                      </div>--}}
{{--                      <h4>--}}
{{--                      {{ $msg->subject }}--}}
{{--                        <small><i class="fa fa-clock-o"></i> {{ $msg->created_at->diffForHumans()}}</small>--}}
{{--                      </h4>--}}
{{--                      <p>{{  substr ($msg->message, 0, 35) }} ...</p>--}}
{{--                    </a>--}}
{{--                  </li>--}}
{{--                  @endforeach--}}
{{--                </ul>--}}
{{--              </li>--}}
{{--              <li class="footer"><a href="/admin/messages">@lang('lang.ReadMore')</a></li>--}}
{{--            </ul>--}}
{{--          </li>--}}
{{--          @endif--}}

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('lang.Langs')
              <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li>
                  <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                      {{ $properties['native'] }}
                  </a>
                </li>
              @endforeach
            </ul>
          </li>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
          </li>

          <li>
              <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"><i class="fa fa-sign-in" aria-hidden="true"></i>
                  {{ __('lang.Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </li>

        </ul>
      </div>
    </nav>
  </header>
