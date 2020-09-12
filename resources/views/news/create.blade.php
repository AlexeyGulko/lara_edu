@extends('admin.layout.master')
@section('title', 'Написать новость')
@section('content')
    <x-news.form
        :action="route('admin.news.store')"
    ></x-news.form>
@endsection
