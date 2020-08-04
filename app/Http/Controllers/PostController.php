<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Model\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class PostController extends Controller
{

    /**
     * return latest posts
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = Post::latest()->get();
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
        Post::create($request->validated());
        return redirect()->route('home');
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
        return redirect()->route('home');
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
        return redirect()->route('home');
    }
}
