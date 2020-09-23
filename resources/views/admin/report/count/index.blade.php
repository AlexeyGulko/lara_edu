@extends('admin.layout.master')
@section('title', 'Количество')
@section('content')
    <div class="col col-md-4 col-sm-6 col-12 text-center">
        <dropdown-multiselect :options="{{ $options }}"></dropdown-multiselect>
    </div>
@endsection
