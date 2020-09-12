<?php


namespace App\View\Components\Post;


class PublishCheckbox extends \App\View\Components\Contracts\PublishCheckbox
{

    protected function getRoute()
    {
        return route('posts.publish', $this->item);
    }
}
