<?php

namespace App\Http\Controllers;

use App\Tag;

class TagController extends Controller
{
    public function index(Tag $tag)
    {
        $posts = $tag->posts()->published()->with('tags')->latest()->get();
        return view('index', compact('posts'));
    }
}
