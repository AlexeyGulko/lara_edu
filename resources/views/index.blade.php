@extends('layout.master')
@section('title', 'Главная')
@section('content')
    <div class="col-md-8">
        @foreach($posts as $post)
            <div class="blog-post">
                <h2 class="blog-post-title">{{ $post->title }}</h2>
                @include('layout.tags', ['tags' => $post->tags])
                <p class="blog-post-meta">{{ $post->created_at->format('d M Y') }}</p>
                <p>
                    {{ $post->description }}
                </p>
                <a href="{{ route('posts.show', $post->slug) }}">Читать</a>
            </div>
        @endforeach
    </div>
@endsection
