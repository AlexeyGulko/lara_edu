<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{
    protected function redirectTo()
    {
        return redirect()->route('admin.news.index');
    }

    public function index()
    {
        $news = Cache::tags(['news', 'tags'])->remember(
            'news_admin',
            3600,
            function () {
            return News::latest()->get();
        });
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }
}
