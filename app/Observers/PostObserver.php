<?php

namespace App\Observers;

use App\Mail\PostCreated;
use App\Mail\PostDeleted;
use App\Mail\PostUpdated;
use App\Models\Post;
use App\Service\Webpushr;
use Illuminate\Support\Arr;

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
        $post->saveHistory();
        flashMessage('Пост обновлён');
        \Mail::to(config('mail.to.admin'))
            ->queue(new PostUpdated($post));
    }

    /**
     * Handle the post "deleted" event.
     *
     * @param  Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        flashMessage('Пост удалён', 'warning');
        \Mail::to(config('mail.to.admin'))
            ->queue(new PostDeleted($post->attributesToArray()));
    }
}
