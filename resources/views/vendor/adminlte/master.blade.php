<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
@yield('title', config('adminlte.title', 'AdminLTE 2'))
@yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo1.png') }}">

    @yield('css')

    <style>
        .select2-container .select2-selection--single, .select2-container .select2-selection--multiple{
            height: 34px!important;
            border: 1px solid #ccc!important;
            border-radius: 0!important;
        }
        .select2-container .select2-selection--multiple{
            height: 64px!important;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #3c8dbc!important;
            border: 1px solid #3c8dbc!important;
            border-radius: 0!important;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #fff!important;
        }
        .form-group .select2-container {
            position: relative;
            z-index: 2;
            float: left;
            width: 100%!important;
            margin-bottom: 10px;
            display: table;
            table-layout: fixed;
        }
        .panel{
            margin-bottom: 15px;
        }
        .slider.slider-horizontal{
            width: 100%!important;
            height: 22px!important;
            margin-top: 7px;
        }
        .slider .slider-selection {
            background: #b4b7c6!important;
        }
        .table-user tr td.title-table-user{
            padding: 40px 0 20px 0;
            margin: 5px;
        }
        .table-user tr th{
            background-color: #f4f4f4;
        }
        .table-user tr td{
            width: 25%;
        }
    </style>

    @yield('adminlte_css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    {!! Charts::assets() !!}
</head>
<body class="hold-transition @yield('body_class')">

@yield('body')

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@yield('js')

@yield('adminlte_js')

</body>
</html>
