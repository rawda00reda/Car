<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('digitalgoals','Maintainace') }} | @yield('digitalgoals')</title>
    <link rel="icon" href="{{ asset('images/logo.png')}}" type="image/png"/>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('dist/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('dist/plugins/datatables/dataTables.bootstrap.css')}}">

    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"> --}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css')}}">
    @if ( app()->getLocale() == 'en' )
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css')}}">
    @endif
    @if ( app()->getLocale() == 'ar' | app()->getLocale() == 'ur' )
        <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE-rtl.min.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/css/bootstrap-rtl.min.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins-rtl.min.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Cairo', sans-serif;
        }

        h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
            font-family: 'Cairo',sans-serif;
        }

        .checkbox input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio] {
            position: unset;
            margin-top: 4px\9;
            margin-left: 0px;
        }

    </style>
    @endif

    @yield('css')

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        @include('admin.layouts.header')

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        @include('admin.layouts.aside')

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer text-center">
            <strong>
                <p class="leeed">Copyright © 2019 Maintainace. All Rights Reserved.</p>
            </strong>
        </footer>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="{{ asset('dist/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{ asset('dist/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('dist/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset('dist/plugins/fastclick/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/app.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js')}}"></script>
    <script src="{{ asset('dist/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('dist/plugins/datatables/dataTables.bootstrap.js')}}"></script>


    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>

    @yield('js')
</body>

</html>
