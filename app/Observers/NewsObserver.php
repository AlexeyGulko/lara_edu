<?php

namespace App\Observers;

use App\Models\News;
use Illuminate\Support\Facades\Cache;

class NewsObserver
{
    /**
     * Handle the news item "created" event.
     *
     * @param  News  $newsItem
     * @return void
     */
    public function created(News $newsItem)
    {
        Cache::tags(['publication', 'news'])->flush();
        flashMessage('Новость создана');
    }

    /**
     * Handle the news item "updated" event.
     *
     * @param  News  $newsItem
     * @return void
     */
    public function updated(News $newsItem)
    {
        Cache::tags(['publication', 'news'])->flush();
        flashMessage('Новость обновлена');
    }

    /**
     * Handle the news item "deleted" event.
     *
     * @param  News  $newsItem
     * @return void
     */
    public function deleted(News $newsItem)
    {
        Cache::tags(['publication', 'news'])->flush();
        flashMessage('Новость удалена', 'warning');
    }
}
