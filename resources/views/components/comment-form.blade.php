<div>
    <!-- Order your soul. Reduce your wants. - Augustine -->
    <form method="POST" action="{{ $action }}" class="needs-validation">
        @csrf
        <div class="form-group">
            <textarea
                class="form-control @error('body') is-invalid @enderror"
                id="commentArea"
                rows="3"
                name="body"
                placeholder="Напишите коммент"
            ></textarea>
            @error('body')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>
