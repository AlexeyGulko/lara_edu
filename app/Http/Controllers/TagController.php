<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function index(Tag $tag)
    {
        $tag->load('posts', 'news');
        $items = collect($tag->getRelations())
            ->flatten()
            ->sortByDesc('created_at')
            ->all();
        return view('tag.index', compact('items'));
    }
}
