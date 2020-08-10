<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this
            ->middleware('can:update,post')
            ->except(['index', 'create', 'store', 'show',])
        ;
    }

    public function redirectTo()
    {
        dump(request()->url(), request()->is('/admin/*'));
        $path = request()->is('admin/*')
            ? route('admin.posts.index')
            : route('posts.index');
        return redirect($path);
    }

    /**
     * return latest posts
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = Post::published()->with('tags')->latest()->get();
        return view('index', compact('posts'));
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
    public function store(StorePost $request)
    {
        $validated = $request->validated();
        $validated['owner_id'] = auth()->id();
        $post = Post::create($validated);
        empty($request->tags)
            ?: $post->syncTags($request->tags);
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
     * @return RedirectResponse
     */
    public function update(StorePost $request, Post $post)
    {
        $post->update($request->validated());
        empty($request->tags)
            ?: $post->syncTags($request->tags);
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
