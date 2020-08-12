<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\PostController as PostResourceController;
use App\Post;
use Illuminate\Contracts\Support\Renderable;

class PostController extends PostResourceController
{

    public function __construct()
    {
        $this->middleware('can:administrate');
    }

    /**
     * return latest posts
     *
     * @return Renderable
     */
    public function index()
    {
        $posts = Post::with(['tags', 'owner'])->latest()->get();
        return view('admin.post.index', compact('posts'));
    }

    public function edit(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }
}
