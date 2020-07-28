@extends('layout.master')
@section('title', $post->title)
@section('content')
<main role="main" class="container">
    <div class="row mb-2">
        <div class="col-md-8">
            <div class="blog-post">
                <h2 class="blog-post-title">{{ $post->title }}</h2>
                <p class="blog-post-meta">{{ $post->created_at->format('d M Y') }}</p>
                <p></p>{{ $post->description }}</p>
                <hr>
                <p>{{ $post->body }}</p>
                <hr>
                <a href="{{ route('home') }}">На главную</a>
            </div>
        </div>
        @include('layout.sidebar')
    </div>
</main><!-- /.container -->
@endsection


