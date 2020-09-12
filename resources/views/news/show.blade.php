@extends('layout.master')
@section('title', $news->title)
@section('content')
    <div class="col-md-8">
        <div class="blog-post">
            <h2 class="blog-post-title">{{ $news->title }}</h2>
            @include('layout.tags', ['tags' => $news->tags])
            <p class="blog-post-meta">{{ $news->created_at->format('d M Y') }}</p>
            <p>{{ $news->description }}</p>
            <hr>
            <p>{{ $news->body }}</p>
            <hr>
        </div>
        <a href="{{ route('news.index') }}" class="btn btn-outline-primary">К новостям</a>
        <hr>
        <x-news.comment-form :object="$news"></x-news.comment-form>
        <x-comments :item="$news"></x-comments>
    </div>
@endsection


