<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNews;
use App\NewsItem;

class NewsController extends Controller
{
    public function redirectTo()
    {
        return redirect()->route('admin.news.index');
    }

    public function index()
    {
        $news = NewsItem::latest()->get();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(NewsItem $news, StoreNews $request)
    {
        $validated = $request->validated();
        $validated['owner_id'] = auth()->id();
        $news = NewsItem::create($validated);
        empty($request->tags)
            ?: $news->syncTags($request->tags);
        return $this->redirectTo();
    }

    public function edit(NewsItem $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(NewsItem $news, StoreNews $request)
    {
        $news->update($request->validated());
        empty($request->tags)
            ?: $news->syncTags($request->tags);
        return $this->redirectTo();
    }

    public function destroy(NewsItem $news)
    {
        $news->delete();
        return $this->redirectTo();
    }

    public function publish(NewsItem $news)
    {
        $news->update(['published' => \request()->boolean('published')]);
        return redirect()->route('admin.posts.index');
    }
}
