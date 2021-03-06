<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\Post;
use App\Service\TagService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this
            ->middleware('can:update,post')
            ->except(['index', 'create', 'store', 'show',])
        ;
    }

    /**
     * helper method
     *
     * @return RedirectResponse
     */
    protected function redirectTo()
    {
        return redirect()->route('posts.index');
    }

    /**
     * return latest posts
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = Cache::tags(['post', 'tag'])->remember(
            'posts',
            3600,
            function () {
                return Post::latest()->get();
            });
        return view('post.index', compact('posts'));
    }

    /**
     * create form
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * store post
     *
     * @param StorePost $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(StorePost $request, TagService $tagService)
    {
        $validated = $request->validated();
        $validated['owner_id'] = auth()->id();
        $post = Post::create($validated);
        $tagService->sync($post, $request->tags);
        return $this->redirectTo();
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StorePost $request
     * @param Post $post
     * @param TagService $tagService
     * @return RedirectResponse
     */
    public function update(StorePost $request, Post $post)
    {
        $post->update($request->validated());
        $post->syncTags($request->tags);
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
