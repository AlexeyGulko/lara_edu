<?php

namespace App\Http\Controllers;

use App\Interfaces\CanBePublished;

class PublishController extends Controller
{
    public function toggle(CanBePublished $item)
    {
        $item->publish();
        return redirect()->back();
    }
}
