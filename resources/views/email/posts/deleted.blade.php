@component('mail::message')

Пост {{ $post->title }} удалён

@component('mail::button', ['url' => route('home')])
На главную
@endcomponent

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
