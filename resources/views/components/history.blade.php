<div>
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
    @forelse ($object->history as $history)
        <p class="text-info">
            {{ $history->user->email }}
            {{ $history->created_at->diffForHumans() }} Изменил:
        </p>
        <p>
            @foreach($history->after as $field => $change)
                {{$field}} на {{ $change }}
            @endforeach
        </p>
        @empty
            <p>{{ 'Нет изменений' }}</p>
    @endforelse
</div>
