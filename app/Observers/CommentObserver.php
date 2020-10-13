<?php

namespace App\Observers;

use App\Models\Comment;
use Illuminate\Support\Facades\Cache;

class CommentObserver
{
    /**
     * Handle the comment "created" event.
     *
     * @param  Comment  $comment
     * @return void
     */
    public function created(Comment $comment)
    {
        $commentable = $comment->commentable;
        Cache::tags($commentable->modelAlias())->forget($commentable->slug);
        Cache::tags('statistic')->flush();
        flashMessage('Коммент добавлен');
    }
}
