@extends('admin.layout.master')
@section('title', 'Отзывы')
@section('content')
    <div class="col-md-8">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">email</th>
                <th scope="col">Сообщение</th>
                <th scope="col">Дата получения</th>
            </tr>
            </thead>
            <tbody>
            @foreach($feedbacks as $feedback)
                <tr>
                    <td scope="col">{{ $feedback->email }}</td>
                    <td scope="col">{{ $feedback->message }}</td>
                    <td scope="col">{{ $feedback->created_at->format('d M Y') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


