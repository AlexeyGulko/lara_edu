<?php

namespace App\Observers;

use App\Events\PostUpdatedEvent;
use App\Mail\PostCreated;
use App\Mail\PostDeleted;
use App\Mail\PostUpdated;
use App\Models\Post;
use App\Service\Webpushr;
use Illuminate\Support\Facades\Cache;

class PostObserver
{
    protected $webpushr;

    public function __construct(Webpushr $webpushr)
    {
        $this->webpushr = $webpushr;
    }

    /**
     * Handle the post "created" event.
     *
     * @param  Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        Cache::tags(['post'])->flush();
        flashMessage('Пост создан');
        $this->webpushr->send($post->title, $post->description);
        \Mail::to(config('mail.to.admin'))
            ->queue(new PostCreated($post));
    }

    /**
     * Handle the post "updated" event.
     *
     * @param  Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        Cache::tags(['post'])->flush();
        $post->saveHistory();
        flashMessage('Пост обновлён');
        \Mail::to(config('mail.to.admin'))
            ->queue(new PostUpdated($post));
        event(new PostUpdatedEvent($post));
    }

    /**
     * Handle the post "deleted" event.
     *
     * @param  Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        Cache::tags(['post'])->flush();
        flashMessage('Пост удалён', 'warning');
        \Mail::to(config('mail.to.admin'))
            ->queue(new PostDeleted($post->attributesToArray()));
    }
}
