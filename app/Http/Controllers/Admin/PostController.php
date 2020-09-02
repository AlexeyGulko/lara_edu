<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePost;
use App\Post;
use App\Service\TagService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

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

    /**
     * Update the specified resource in storage.
     *
     * @param StorePost $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(StorePost $request, Post $post, TagService $tagService)
    {
        $post->update($request->validated());
        $tagService->sync($post, $request->tags);
        return $this->redirectTo();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return $this->redirectTo();
    }
}
