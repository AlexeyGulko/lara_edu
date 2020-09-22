@extends('admin.layout.master')
@section('title', 'Количество')
@section('content')
    <div class="col col-md-3 col-sm-4 col-6 text-center">
        <dropdown-multiselect :options="[
        { name: 'kek' },
      ]"></dropdown-multiselect>
    </div>
@endsection
