<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PublishController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:administrate');
    }

    public function toggle(Post $post)
    {
        $post->update(['published' => \request()->boolean('published')]);
        return redirect()->route('admin.posts.index');
    }
}
