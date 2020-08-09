@component('mail::message')
# Posts for last {{ $days }} days
<table style="width: 100%; text-align: center;">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">title</th>
        <th scope="col">description</th>
    </tr>
    </thead>
    <hr>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <th scope="row"> {{ $loop->iteration }}</th>
            <td><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></td>
            <td>{{ $post->description }} </td>
        </tr>
    @endforeach
    </tbody>
</table>
<br>
<hr>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
