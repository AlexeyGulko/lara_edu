@extends('admin.layout.master')
@section('title', 'Статьи')
@section('content')
    <div class="col">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Заголовок</th>
                <th scope="col">Автор</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Опубликован</th>
                <th scope="col">Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <a
                            href="{{ route('admin.posts.edit', $post) }}"
                        >
                            {{ $post->title }}
                        </a>
                    </td>
                    <td>{{ $post->owner->name }}</td>
                    <td>{{ $post->created_at->format('d M Y') }}</td>
                    <td>
                        <form
                            action="{{ route('admin.posts.publish', $post) }}"
                            method="POST"
                        >
                            @csrf
                            @method('PUT')
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    name="published"
                                    @if($post->published )
                                    checked
                                    @endif
                                    onchange="this.form.submit()"
                                >
                            </div>
                        </form>
                    </td>
                    <td>
                        <x-delete-button
                            :item="$post"
                        />
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


