<form
    action="{{ $route }}"
    method="post"
    class="d-inline"
>
    @csrf
    @method('delete')

    <button
        type="submit"
        class="btn btn-outline-danger"
    >
        Удалить
    </button>
</form>
