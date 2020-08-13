@extends('admin.layout.master')
@section('title', 'Редактировать новость')
@section('content')
    <x-post-form
        :action="route('admin.news.update', $news)"
        method="put"
        :item="$news"
    />
@endsection
