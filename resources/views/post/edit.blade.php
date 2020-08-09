@extends('layout.without_sidebar')
@section('title', 'Редактировать пост')
@section('content')
    <x-post-form
        :action="route('admin.posts.update', $post)"
        method="put"
        :post="$post"
    />
@endsection
