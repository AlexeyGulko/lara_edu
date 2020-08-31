<?php


namespace App\Traits;



trait Publish
{
    public function publish()
    {
        $this->update(['published' => ! $this->published]);
    }
}
