<div class="blog-post">
    <h2 class="blog-post-title">{{ $newsItem->title }}</h2>
    <span class="badge badge-info">Новость</span>
    @include('layout.tags', ['tags' => $newsItem->tags])
    <p class="blog-post-meta">{{ $newsItem->created_at->format('d M Y') }}</p>

    <p>
        {{ $newsItem->description }}
    </p>
    <a href="{{ route('news.show', $newsItem) }}">Читать</a>
</div>
