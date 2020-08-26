<?php


namespace App\Traits;


use App\Comment;

trait DeleteRoute
{
    public function deleteRoute()
    {
        return request()->is('admin/*')
            ? route("admin.{$this->table}.destroy", $this)
            : route("{$this->table}.destroy", $this);
    }
}
