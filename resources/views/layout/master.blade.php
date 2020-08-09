@extends('layout.head')
@section('master')
    <main role="main" class="container">
        @include('layout.header')
        @section('nav')
            @include('layout.nav')
        @show
        @include('layout.flash_message')
        <div class="row my-4">
            @yield('content')
            @section('sidebar')
                @include('layout.sidebar')
            @show
        </div>
    </main>
    @include('layout.footer')
@endsection
