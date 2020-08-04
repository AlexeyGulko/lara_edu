@extends('layout.without_sidebar')
@section('title', 'Написать пост')
@section('content')
<div class="container mb-4">
    <div class="row">
        <div class="col-md-8">
            <form
                action="{{ route('posts.store') }}"
                method="POST"
                class="needs-validation"
            >
                @csrf
                <div class="form-group">
                    <label for="title">Название</label>
                    <input
                        type="text"
                        class="@error('title') is-invalid @enderror form-control"
                        id="title"
                        name="title"
                        placeholder="Название статьи"
                        value="{{ old('title', $post->title ?? '') }}"
                    >
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug">Символьный код</label>
                    <input
                        type="text"
                        class="form-control @error('slug') is-invalid @enderror"
                        id="slug"
                        name="slug"
                        placeholder="Символьный код"
                        value="{{ old('slug', $post->slug ?? '') }}"
                    >
                    @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Краткое описание</label>
                    <input
                        type="text"
                        class="form-control @error('description') is-invalid @enderror"
                        id="description"
                        name="description"
                        placeholder="Краткое описание"
                        value="{{ old('description', $post->description ?? '') }}"
                    >
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="body">Текст статьи</label>
                    <textarea
                        class="form-control @error('body') is-invalid @enderror"
                        id="body"
                        name="body"
                        rows="5"
                        placeholder="Текст статьи"
                    >{{ old('body', $post->body ?? '') }}</textarea>
                    @error('body')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group form-check">
                    <input
                        type="checkbox"
                        class="form-check-input"
                        id="publish"
                        name="published"
                        {{ ! old('published', $post->published ?? '') ?: 'checked'}}
                    >
                    <label class="form-check-label" for="publish">Опубликовать?</label>
                </div>
                <button type="submit" class="btn btn-primary">Создать</button>
            </form>
        </div>
    </div>
</div>
@endsection
