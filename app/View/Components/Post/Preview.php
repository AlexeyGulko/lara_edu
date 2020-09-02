<?php

namespace App\View\Components\Post;

use App\News;
use App\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class Preview extends Component
{
    public $post;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.post.preview');
    }
}
