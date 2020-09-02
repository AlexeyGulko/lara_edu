<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Contracts\Support\Renderable;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function redirectTo()
    {
        return redirect()->route('admin.posts.index');
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
