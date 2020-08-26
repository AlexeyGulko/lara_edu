<?php

namespace App\View\Components;

use App\Interfaces\CanBeCommented;
use Illuminate\View\Component;

class CommentForm extends Component
{
    public $action;
    /**
     * Create a new component instance.
     *
     * @param CanBeCommented $object
     */
    public function __construct(CanBeCommented $object)
    {
        $this->action = $object->commentStoreRoute();
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
