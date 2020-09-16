@extends('layout.master')
@section('title', 'Главная')
@section('content')
    <div class="col-md-8">
        @forelse($items as $item)
            <x-tag.preview :item="$item"></x-tag.preview>
        @empty
            <p>У тега нет записей</p>
        @endforelse
    </div>
@endsection
