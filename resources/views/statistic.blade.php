@php
use \Illuminate\Support\Arr;
@endphp
@extends('layout.master')
@section('title', 'Статистика')
@section('content')
    <div class="col-md-8">
        <ul class="list-group">
            <li class="list-group-item">
                Общее количество статей: {{ Arr::get($statistics, 'posts_quantity') }}
            </li>
            <li class="list-group-item">
                Общее количество новстей: {{ Arr::get($statistics, 'news_quantity') }}
            </li>
            <li class="list-group-item">
                Автор с наибольшим количеством статей:
                {{ Arr::get($statistics, 'user_with_the_most_posts') }}
            </li>
            <li class="list-group-item">
                Самая длинная статья:
                <a href="{{ route('posts.show', Arr::get($statistics, 'longest_post')->slug) }}">
                    {{ Arr::get($statistics, 'longest_post')->title }}
                </a>
                <span class="badge badge-primary badge-pill">
                        {{ Arr::get($statistics, 'longest_post')->length }}
                </span>
            </li>
            <li class="list-group-item">
                Самая короткая статья:
                <a href="{{ route('posts.show', Arr::get($statistics, 'shortest_post')->slug) }}">
                    {{ Arr::get($statistics, 'shortest_post')->title }}
                </a>
                <span class="badge badge-primary badge-pill">
                        {{ Arr::get($statistics, 'shortest_post')->length }}
                </span>
            </li>
            <li class="list-group-item">
                Средние количество статей у “активных” пользователей: {{ Arr::get($statistics, 'avg_posts_per_active_user') }}
            </li>
            <li class="list-group-item">
                Самая непостоянная статья:
                <a href="{{ route('posts.show', Arr::get($statistics, 'most_unstable_post')->slug) }}">
                    {{ Arr::get($statistics, 'most_unstable_post')->title }}
                </a>
            </li>
            <li class="list-group-item">
                Самая комментируемая статья:
                <a href="{{ route('posts.show', Arr::get($statistics, 'most_commented_post')->slug) }}">
                    {{ Arr::get($statistics, 'most_commented_post')->title }}
                </a>
            </li>
        </ul>
    </div>
@endsection
