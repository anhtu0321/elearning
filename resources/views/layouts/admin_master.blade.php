<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper" id="app">

    @include('layouts.admin_header')
    @include('layouts.admin_sidebar')

        <admin-master></admin-master>  
    </div>
    @include('layouts.admin_footer')

</div>

    <script type="application/javascript" src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <script type="application/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script type="application/javascript" src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    


    <script type="application/javascript" src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script type="application/javascript" src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
    <script type="application/javascript"src="{{ asset('plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script type="application/javascript" src="{{ asset('plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
    <script type="application/javascript" src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <script type="application/javascript" src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script type="application/javascript" src="{{ asset('dist/js/demo.js') }}"></script>

    {{-- <script type="application/javascript" src="{{ asset('dist/js/pages/dashboard2.js') }}"></script> --}}
    <script type="application/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>

