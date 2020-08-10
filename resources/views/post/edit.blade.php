@extends('layout.without_sidebar')
@section('title', 'Редактировать пост')
@section('content')
    <x-post-form
        :action="route('posts.update', $post)"
        method="put"
        :post="$post"
    />
@endsection
