<!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
<div>
    @forelse($item->comments as $comment)
        <span>{{ $comment->body }}</span>
    @empty
        <p>Нет комментов</p>
    @endforelse
</div>
