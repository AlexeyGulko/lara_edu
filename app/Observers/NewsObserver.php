<?php

namespace App\Observers;

use App\News;

class NewsObserver
{
    /**
     * Handle the news item "created" event.
     *
     * @param  \App\News  $newsItem
     * @return void
     */
    public function created(News $newsItem)
    {
        flashMessage('Новость создана');
    }

    /**
     * Handle the news item "updated" event.
     *
     * @param  \App\News  $newsItem
     * @return void
     */
    public function updated(News $newsItem)
    {
        flashMessage('Новость обновлена');
    }

    /**
     * Handle the news item "deleted" event.
     *
     * @param  \App\News  $newsItem
     * @return void
     */
    public function deleted(News $newsItem)
    {
        flashMessage('Новость удалена', 'warning');
    }
}
