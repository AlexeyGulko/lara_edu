<?php

namespace App\Http\Controllers;

use App\NewsItem;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = NewsItem::latest()->get();
        return view('news.index', compact('news'));
    }

    public function show(NewsItem $news)
    {
        return view('news.show', compact('news'));
    }
}
