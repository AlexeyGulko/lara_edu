@forelse($item->comments->all() as $comment)
    <div class="my-4">
        <h5>{{ $comment->owner->name }}</h5>
        <span>{{ $comment->body }}</span>
    </div>
@empty
    <p>Нет комментов</p>
@endforelse
