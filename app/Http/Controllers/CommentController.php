<?php

namespace App\Http\Controllers;

use App\Interfaces\CanBeCommented;
use App\News;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Post|News
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CanBeCommented $object, Request $request)
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
