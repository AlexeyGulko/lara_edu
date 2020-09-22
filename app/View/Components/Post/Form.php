<?php

namespace App\View\Components\Post;

use App\Models\Post;
use Illuminate\View\Component;

class Form extends Component
{
    public $item;
    public $method;
    public $action;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action, $item = null, $method = 'post')
    {
        $this->action = $action;
        $this->method = $method;
        $this->item = $item;
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
