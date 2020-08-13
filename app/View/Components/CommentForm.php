<?php

namespace App\View\Components;

use App\NewsItem;
use App\Post;
use Illuminate\View\Component;

class CommentForm extends Component
{
    public $action;
    /**
     * Create a new component instance.
     *
     * @param $object
     */
    public function __construct($object)
    {
        $this->action = $this->choseAction($object);
    }

    protected function choseAction($object)
    {
        if ($object instanceof Post) {
            return route('posts.comments.store', $object);
        } elseif ($object instanceof NewsItem) {
            return route('news.comments.store', $object);
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.comment-form');
    }
}
