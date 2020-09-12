<form
    action="{{ $action }}"
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
