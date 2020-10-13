<?php

namespace App\Http\Controllers;

use App\Interfaces\CanBeCommented;
use App\Models\News;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CommentController extends Controller
{
    /**
     * @param CanBeCommented $object
     * @param Request $request
     * @return RedirectResponse
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
