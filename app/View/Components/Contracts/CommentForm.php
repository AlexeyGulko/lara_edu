<?php

namespace App\View\Components\Contracts;

use App\Interfaces\CanBeCommented;
use Illuminate\View\Component;

abstract class CommentForm extends Component
{
    public $action;
    /**
     * Create a new component instance.
     *
     * @param CanBeCommented $object
     */
    public function __construct(CanBeCommented $object)
    {
        $this->action = $this->getRoute($object);
    }

    abstract protected function getRoute($object);

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
