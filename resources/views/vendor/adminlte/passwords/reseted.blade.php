@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@endsection

@section('body_class', 'login-page')

@section('body')
    <div class="login-box">
        <div class="login-logo">
            <img src="{{ asset('images/logo2.png') }}" alt="">
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <br/>
            <div class="alert alert-success">
                {{ trans('words.lte.reset_password_success') }}
            </div>
        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
@endsection

@section('adminlte_js')
    @yield('js')
@endsection
