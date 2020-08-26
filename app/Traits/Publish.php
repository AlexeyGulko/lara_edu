<?php


namespace App\Traits;



trait Publish
{
    public function publishRoute()
    {
        return route("admin.{$this->table}.publish", $this);
    }

    public function publish()
    {
        $this->update(['published' => ! $this->published]);
    }
}
