<?php

namespace App\View\Components;

use App\News;
use App\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class TagItem extends Component
{
    public $item;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Model $item)
    {
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        if ($this->item instanceof Post) {
            return view('components.post.preview', ['post' => $this->item]);
        } elseif ($this->item instanceof News) {
            return view('components.news.preview', ['newsItem' => $this->item]);
        }
    }
}
