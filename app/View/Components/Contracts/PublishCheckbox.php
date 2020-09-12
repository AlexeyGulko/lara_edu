<?php

namespace App\View\Components\Contracts;

use App\Interfaces\CanBePublished;
use Illuminate\View\Component;

abstract class PublishCheckbox extends Component
{
    public $action;
    public $item;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(CanBePublished $item)
    {
        $this->item = $item;
        $this->action = $this->getRoute();
    }

    abstract protected function getRoute();

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.publish-checkbox');
    }
}
