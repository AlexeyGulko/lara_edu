@php
    $tags = $tags ?? collect();
@endphp

@if($tags->isNotEmpty())
    @foreach($tags as $tag)
        <a
            href="{{ route('posts.index.tags', $tag) }}"
            class="badge badge-secondary"
        >
            {{ $tag->name }}
        </a>
    @endforeach
@endif
