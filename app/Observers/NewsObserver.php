<?php

namespace App\Observers;

use App\NewsItem;

class NewsObserver
{
    /**
     * Handle the news item "created" event.
     *
     * @param  \App\NewsItem  $newsItem
     * @return void
     */
    public function created(NewsItem $newsItem)
    {
        flashMessage('Новость создана');
    }

    /**
     * Handle the news item "updated" event.
     *
     * @param  \App\NewsItem  $newsItem
     * @return void
     */
    public function updated(NewsItem $newsItem)
    {
        flashMessage('Новость обновлена');
    }

    /**
     * Handle the news item "deleted" event.
     *
     * @param  \App\NewsItem  $newsItem
     * @return void
     */
    public function deleted(NewsItem $newsItem)
    {
        flashMessage('Новость удалена', 'warning');
    }
}
