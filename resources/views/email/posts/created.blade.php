@component('mail::message')

Пост {{ $post->title }} создан

@component('mail::button', ['url' => route('posts.show', $post)])
К посту
@endcomponent

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
