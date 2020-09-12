<div class="blog-post">
    <h2 class="blog-post-title">{{ $news->title }}</h2>
    <span class="badge badge-info">Новость</span>
    @include('layout.tags', ['tags' => $news->tags])
    <p class="blog-post-meta">{{ $news->created_at->format('d M Y') }}</p>

    <p>
        {{ $news->description }}
    </p>
    <a href="{{ route('news.show', $news) }}">Читать</a>
</div>
