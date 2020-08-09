@extends('admin.layout.master')
@section('title', 'Написать пост')
@section('content')
    <x-post-form
        :action="route('admin.posts.update', $post)"
        method="put"
        :post="$post"
    />
@endsection
