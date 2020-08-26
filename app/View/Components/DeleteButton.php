<?php

namespace App\View\Components;

use App\Interfaces\CanBeDeleted;
use Illuminate\View\Component;

class DeleteButton extends Component
{
    public $route;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(CanBeDeleted $item)
    {
        $this->route = $item->deleteRoute();
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
}
