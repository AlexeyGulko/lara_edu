<?php

namespace App\View\Components\post;

use App\Post;
use Illuminate\View\Component;

class Form extends Component
{
    public $post;
    public $method;
    public $action;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action, Post $post, $method = 'post')
    {
        $this->action = $action;
        $this->method = $method;
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.post.form');
    }
}
