@extends('layout.header')
@section('master')
    @include('layout.nav')
    <main role="main" class="container">
        <div class="row my-4">
            @yield('content')
            @section('sidebar')
                @include('layout.sidebar')
            @show
        </div>
    </main>
    @include('layout.footer')
@endsection
