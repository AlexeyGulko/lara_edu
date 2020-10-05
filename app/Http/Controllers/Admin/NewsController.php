<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NewsController as NewsResourceController;
use App\Http\Requests\StoreNews;
use App\Models\News;
use App\Service\TagService;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:administrate');
    }

    protected function redirectTo()
    {
        return redirect()->route('admin.news.index');
    }

    public function index()
    {
        $news = News::latest()->get();
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
