<div class="container mb-4">
    <div class="row">
        <div class="col-md-8">
            <form
                action="{{ $action }}"
                method="POST"
                class="needs-validation"
            >
                @csrf
                @method($method)
                <div class="form-group">
                    <label for="title">Название</label>
                    <input
                        type="text"
                        class="@error('title') is-invalid @enderror form-control"
                        id="title"
                        name="title"
                        placeholder="Название статьи"
                        value="{{ old('title', $item->title ?? '') }}"
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
                        value="{{ old('slug', $item->slug ?? '') }}"
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
                        value="{{ old('description', $item->description ?? '') }}"
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
                    >{{ old('body', $item->body ?? '') }}</textarea>
                    @error('body')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tags">Тэги</label>
                    <input
                        type="text"
                        class="form-control @error('tags') is-invalid @enderror"
                        id="tags"
                        name="tags"
                        placeholder="Введите тэги черезе запятую"
                        value="{{ old('tags', $item->tags_as_string ?? '') }}"
                    >
                    @error('description')
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
                        {{ ! old('published', $item->published ?? '') ?: 'checked'}}
                    >
                    <label class="form-check-label" for="publish">Опубликовать?</label>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
            <hr>
            @if(request()->is('*posts/*/edit'))
                <x-history :object="$item"></x-history>
            @endif
        </div>
    </div>
</div>
