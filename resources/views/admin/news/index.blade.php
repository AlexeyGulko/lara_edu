@extends('admin.layout.master')
@section('title', 'Статьи')
@section('content')
    <div class="col">
        <a
            class="btn btn-outline-primary mb-4"
            href="{{ route('admin.news.create') }}"
        >
            Написать новость
        </a>
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
            @foreach($news as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <a
                            href="{{ route('admin.news.edit', $item) }}"
                        >
                            {{ $item->title }}
                        </a>
                    </td>
                    <td>{{ $item->owner->name }}</td>
                    <td>{{ $item->created_at->format('d M Y') }}</td>
                    <td>
                        <form
                            action="{{ route('admin.news.publish', $item) }}"
                            method="POST"
                        >
                            @csrf
                            @method('PUT')
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    name="published"
                                    @if($item->published )
                                    checked
                                    @endif
                                    onchange="this.form.submit()"
                                >
                            </div>
                        </form>
                    </td>
                    <td>
                        <x-delete-button :item="$item"></x-delete-button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

