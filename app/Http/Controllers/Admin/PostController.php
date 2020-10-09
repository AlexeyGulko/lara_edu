<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
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
        $posts = Cache::tags(['post', 'tag'])
            ->remember(
                'post_admin',
                3600,
                function (){
            return Post::latest()->get();
        });
        return view('admin.post.index', compact('posts'));
    }

    public function edit(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }
}
