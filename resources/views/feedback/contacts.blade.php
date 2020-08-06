@extends('layout.master')
@section('title', 'Контакты')
@section('content')
    <div class="col-md-8">
        <form
            action="{{ route('feedback.store') }}"
            method="POST"
            class="needs-validation"
            novalidate
        >
            @csrf
            <div class="form-group">
                <label for="email">e-mail</label>
                <input
                    type="email"
                    class="@error('email') is-invalid @enderror form-control"
                    id="email"
                    name="email"
                    placeholder="введите почту"
                    value="{{ old('email', '') }}"
                >
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="message">Сообщение</label>
                <textarea
                    class="form-control @error('message') is-invalid @enderror"
                    id="message"
                    name="message"
                    placeholder="напишите сообщение"
                >{{ old('message', '') }}</textarea>
                @error('message')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Написать</button>
        </form>
    </div>
@endsection


