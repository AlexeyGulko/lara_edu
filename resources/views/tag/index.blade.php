@extends('layout.master')
@section('title', 'Главная')
@section('content')
    <div class="col-md-8">
        @forelse($items as $item)
            @if($item instanceof \App\Post)
                <x-post.preview :post="$item"></x-post.preview>
            @elseif($item instanceof \App\News)
                <x-news.preview :news="$item"></x-news.preview>
            @endif
        @empty
            <p>У тега нет записей</p>
        @endforelse
    </div>
@endsection
