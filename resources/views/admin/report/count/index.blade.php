@extends('admin.layout.master')
@section('title', 'Количество')
@section('content')
    <div class="col col-md-3 col-sm-4 col-6 text-center">
        <a
            class="btn btn-outline-primary"
            style="width: 10rem;"
            href="{{ route('admin.posts.index') }}"
        >
            <svg width="6em" height="6em" viewBox="0 0 16 16" class="bi bi-bar-chart-fill mx-auto mt-3 mb-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <rect width="4" height="5" x="1" y="10" rx="1"/>
                <rect width="4" height="9" x="6" y="6" rx="1"/>
                <rect width="4" height="14" x="11" y="1" rx="1"/>
            </svg>
            <span>Статьи</span>
        </a>
    </div>
@endsection
