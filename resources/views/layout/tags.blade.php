@php
    $tags = $tags ?? collect();
@endphp

@if($tags->isNotEmpty())
    @foreach($tags as $tag)
        <a
            href="{{ route('tags.index', $tag) }}"
            class="badge badge-secondary"
        >
            {{ $tag->name }}
        </a>
    @endforeach
@endif
