<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/startmin/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('assets/startmin/css/metisMenu.min.css')}}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{{asset('assets/startmin/css/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{asset('assets/startmin/css/dataTables/dataTables.responsive.css')}}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{asset('assets/startmin/css/timeline.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('assets/startmin/css/startmin.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('assets/startmin/css/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('assets/startmin/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
  <div id="wrapper">

    @include('admin.header')
    @include('admin.sidebar')
    <!-- Page Content -->
    <div id="page-wrapper">
       <div class="container-fluid">
           @yield('pagecontent')
   </div>


 </div>
    <!-- jQuery -->
    <script src="{{ asset('assets/startmin/js/jquery.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('assets/startmin/js/bootstrap.min.js') }}"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('assets/startmin/js/metisMenu.min.js') }}"></script>
    <!-- DataTables JavaScript -->
    <script src="{{ asset('assets/startmin/js/dataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/startmin/js/dataTables/dataTables.bootstrap.min.js') }}"></script>
     <!-- Custom Theme JavaScript -->
    <script src="{{ asset('assets/startmin/js/startmin.js') }}"></script>
  </body>
</html>
