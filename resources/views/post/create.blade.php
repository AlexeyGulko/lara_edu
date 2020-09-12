@extends('layout.without_sidebar')
@section('title', 'Написать пост')
@section('content')
    <x-post.form
        :action="route('posts.store')"
    ></x-post.form>
@endsection
