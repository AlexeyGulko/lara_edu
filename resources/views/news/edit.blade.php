@extends('admin.layout.master')
@section('title', 'Редактировать новость')
@section('content')
    <x-news.form
        :action="route('admin.news.update', $news)"
        method="put"
        :item="$news"
    ></x-news.form>
@endsection
