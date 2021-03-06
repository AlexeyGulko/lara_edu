<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNews;
use App\Models\News;
use App\Service\TagService;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{
    protected function redirectTo()
    {
        return redirect()->route('home');
    }

    public function index()
    {
        $news = Cache::tags(['news', 'tag'])->remember(
            'news',
            3600,
            function () {
                return News::latest()->get();
            });
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

    public function store(News $news, StoreNews $request, TagService $tagService)
    {
        $validated = $request->validated();
        $validated['owner_id'] = auth()->id();
        $news = News::create($validated);
        $tagService->sync($news, $request->tags);
        return $this->redirectTo();
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(News $news, StoreNews $request)
    {
        $news->update($request->validated());
        $news->syncTags($request->tags);
        return $this->redirectTo();
    }

    public function destroy(News $news)
    {
        $news->delete();
        return $this->redirectTo();
    }
}
