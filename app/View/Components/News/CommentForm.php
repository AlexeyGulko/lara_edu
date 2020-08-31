<?php


namespace App\View\Components\News;


class CommentForm extends \App\View\Components\Contracts\CommentForm
{

    protected function getRoute($object)
    {
        return route('news.comments.store', $object);
    }
}
