<?php

namespace App\Http\Controllers;

use App\NewsItem;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Post|NewsItem
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($object, Request $request)
    {
        $validated = $request->validate(['body' => 'required',]);
        $validated['owner_id'] = auth()->id();
        $object
            ->comments()
            ->create($validated)
        ;
        return redirect()->back();
    }
}
