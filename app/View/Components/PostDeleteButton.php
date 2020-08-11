<?php

namespace App\View\Components;

use App\Post;
use Illuminate\View\Component;

class PostDeleteButton extends Component
{
    public $route;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        dump($post);
        $this->route = $this->createRoute($post);
    }

    public function createRoute(Post $post)
    {
        return request()->is('admin/*')
            ? route('admin.posts.destroy', $post)
            : route('posts.destroy', $post);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.post-delete-button');
    }
}
