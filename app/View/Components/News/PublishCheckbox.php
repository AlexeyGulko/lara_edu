<?php


namespace App\View\Components\News;


class PublishCheckbox extends \App\View\Components\Contracts\PublishCheckbox
{

    protected function getRoute()
    {
        return route('news.publish', $this->item);
    }
}
