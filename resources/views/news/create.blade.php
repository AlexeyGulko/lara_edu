@extends('admin.layout.master')
@section('title', 'Написать новость')
@section('content')
    <x-post-form
        :action="route('admin.news.store')"
    ></x-post-form>
@endsection
