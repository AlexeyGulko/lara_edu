<?php

namespace App\View\Components\Tag;

use App\Interfaces\HasTags;
use Illuminate\View\Component;

class Preview extends Component
{
    public HasTags $item;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(HasTags $item)
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
        return view(
            "components.{$this->item->modelAlias()}.preview",
            [$this->item->modelAlias() => $this->item]
        );
    }
}
