<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;

class PublishController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:administrate');
    }

    public function toggle($item)
    {
        $item->update(['published' => \request()->boolean('published')]);
        return redirect()->back();
    }
}
