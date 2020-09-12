<div class="container">
    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 text-muted" href="{{ route('news.index') }}">Новости</a>
            <a class="p-2 text-muted" href="{{ route('posts.index') }}">Статьи</a>
            <a class="p-2 text-muted" href="{{ route('about') }}">О нас</a>
            <a class="p-2 text-muted" href="{{ route('contacts') }}">Контакты</a>
            <a class="p-2 text-muted" href="{{ route('posts.create') }}">Написать статью</a>
            <a class="p-2 text-muted" href="{{ route('statistic') }}">Статистика</a>
            @can('administrate')
                <a class="p-2 text-muted" href="{{ route('admin.index') }}">Админ</a>
            @endcan
        </nav>
    </div>
</div>
