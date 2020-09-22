<?php

namespace App\Observers;

use App\Models\Comment;

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
        flashMessage('Коммент добавлен');
    }
}
