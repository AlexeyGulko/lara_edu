<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController as PostResourceController;
use App\Http\Requests\StorePost;
use App\Post;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class PostController extends PostResourceController
{

    public function __construct()
    {
        $this->middleware('can:administrate');
    }

    public function redirectTo()
    {
        return redirect()->route('admin.posts');
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

//    public function edit(Post $post)
//    {
//        return view('admin.post.edit', compact('post'));
//    }
}