@extends('layout.header')
@section('master')
    @include('layout.nav')
    @yield('content')

    @include('layout.footer')
@endsection
