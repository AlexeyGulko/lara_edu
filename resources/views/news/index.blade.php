@extends('layout.master')
@section('title', 'Новости')
@section('content')
    <div class="col-md-8">
        @forelse($news as $item)
            <x-news.preview :newsItem="$item"></x-news.preview>
        @empty
            <p>Нет постов</p>
        @endforelse
    </div>
@endsection
