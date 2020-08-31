<?php


namespace App\View\Components\Post;


class CommentForm extends \App\View\Components\Contracts\CommentForm
{

    protected function getRoute($object)
    {
        return route('posts.comments.store', $object);
    }
}
