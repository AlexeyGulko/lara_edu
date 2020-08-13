<?php

namespace App\View\Components;

use App\NewsItem;
use App\Post;
use Illuminate\View\Component;

class DeleteButton extends Component
{
    public $route;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($item)
    {
        $this->route = $this->createRoute($item);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.delete-button');
    }

    public function createRoute($item)
    {
        //TODO refactoring this shit
        if( is_string($item)) {
            return $item;
        } elseif ($item instanceof NewsItem) {
            return route('admin.news.destroy', $item);
        } elseif ($item instanceof Post) {
            return request()->is('admin/*')
                ? route('admin.posts.destroy', $item)
                : route('posts.destroy', $item);
        }
    }
}
