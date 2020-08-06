@extends('layout.without_sidebar')
@section('title', 'Написать пост')
@section('content')
    <x-post-form
        :action="route('posts.store')"
    />
@endsection
