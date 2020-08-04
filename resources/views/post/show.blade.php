@extends('layout.master')
@section('title', $post->title)
@section('content')
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
        <form
            action="{{ route('posts.destroy', $post) }}"
            method="post"
        >
            @csrf
            @method('delete')
            <a
                href="{{ route('posts.edit', $post) }}" c
                class="btn btn-outline-warning"
            >
                Редактировать
            </a>
            <button
                type="submit"
                class="btn btn-outline-danger"
            >
                Удалить
            </button>
        </form>
    </div>
@endsection


