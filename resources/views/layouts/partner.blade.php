@extends('adminlte::page')

@section('adminlte_css')
    <link rel="stylesheet"
          href="{{ asset('public/vendor/adminlte/dist/css/skins/skin-yellow.min.css')}} ">
    @stack('css')
    @yield('css')
@endsection

@section('body_class', 'skin-yellow sidebar-mini') 