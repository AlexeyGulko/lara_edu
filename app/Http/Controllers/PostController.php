<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Model\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->get();
        return view('index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(StorePost $request)
    {
        Post::create($request->validated());
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
