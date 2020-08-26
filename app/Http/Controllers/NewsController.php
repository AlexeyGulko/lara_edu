<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNews;
use App\News;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:administrate')
            ->except('insex', 'show');
    }

    protected function redirectTo()
    {
        return redirect()->route('home');
    }

    public function index()
    {
        $news = News::latest()->get();
        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }


    public function create()
    {
        return view('news.create');
    }

    public function store(News $news, StoreNews $request)
    {
        $validated = $request->validated();
        $validated['owner_id'] = auth()->id();
        $news = News::create($validated);
        empty($request->tags)
            ?: $news->syncTags($request->tags);
        return $this->redirectTo();
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(News $news, StoreNews $request)
    {
        $news->update($request->validated());
        empty($request->tags)
            ?: $news->syncTags($request->tags);
        return $this->redirectTo();
    }

    public function destroy(News $news)
    {
        $news->delete();
        return $this->redirectTo();
    }

    public function publish(News $news)
    {
        $news->update(['published' => \request()->boolean('published')]);
        return $this->redirectTo();
    }
}
