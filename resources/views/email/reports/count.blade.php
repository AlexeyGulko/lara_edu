@component('mail::message')
@component('mail::table')
| #       | название      | количество |
| --------|:-------------:| ----------:|
@foreach($counters as $counter)
| {{$loop->iteration}} | {{ $counter->name }} | {{ $counter->value }} |
@endforeach
@endcomponent

@component('mail::button', ['url' => route('home')])
На главную
@endcomponent

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
