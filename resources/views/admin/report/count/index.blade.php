@extends('admin.layout.master')
@section('title', 'Количество')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-4 col-sm-6 col-12 text-center">
                <dropdown-multiselect :options="{{ $options }}"></dropdown-multiselect>
            </div>
        </div>
        <div class="row my-4">
            <count-report></count-report>
        </div>
    </div>
@endsection
