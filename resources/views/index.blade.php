@extends('layout.master')
@section('title', 'Главная')
@section('content')
<main role="main" class="container">
    <div class="row mb-2">
        <div class="col-md-8">
            @foreach($posts as $post)
                <div class="blog-post">
                    <h2 class="blog-post-title">{{ $post->title }}</h2>
                    <p class="blog-post-meta">{{ $post->created_at->format('d M Y') }}</p>
                    <p>
                        {{ $post->description }}
                    </p>
                    <a href="{{ route('post.show', $post->slug) }}">Читать</a>
                </div>
            @endforeach
        </div>
        @include('layout.sidebar')
    </div>

</main><!-- /.container -->
@endsection


