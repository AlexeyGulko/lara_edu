@if(session()->has('message'))
    <div class="row justify-content-center">
        <div class="alert alert-{{ session('message_type') }} d-block">
            {{ session('message') }}
        </div>
    </div>
@endif
