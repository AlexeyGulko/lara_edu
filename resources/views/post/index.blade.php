@extends('layout.master')
@section('title', 'Главная')
@section('content')
    <div class="col-md-8">
        @forelse($posts as $post)
            <x-post.preview :post="$post"></x-post.preview>
            @empty
            <p>Нет постов</p>
        @endforelse
    </div>
@endsection
