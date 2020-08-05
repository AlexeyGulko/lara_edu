@extends('layout.header')
@section('master')
    @include('layout.nav')
    <main role="main" class="container">
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
