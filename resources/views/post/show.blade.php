@extends('layout.master')
@section('title', $post->title)
@section('content')
    <div class="col-md-8">
        <div class="blog-post">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
            @include('layout.tags', ['tags' => $post->tags])
            <p class="blog-post-meta">{{ $post->created_at->format('d M Y') }}</p>
            <p></p>{{ $post->description }}</p>
            <hr>
            <p>{{ $post->body }}</p>
            <hr>
        </div>
        <a href="{{ route('home') }}" class="btn btn-outline-primary">На главную</a>
        <a
            href="{{ route('posts.edit', $post) }}"
            class="btn btn-outline-warning"
        >
            Редактировать
        </a>
        <form
            action="{{ route('posts.destroy', $post) }}"
            method="post"
            class="d-inline"
        >
            @csrf
            @method('delete')

            <button
                type="submit"
                class="btn btn-outline-danger"
            >
                Удалить
            </button>
        </form>
    </div>
@endsection


