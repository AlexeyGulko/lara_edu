<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Http\Requests\FeedbackStore;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('feedback.contacts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FeedbackStore $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(FeedbackStore $request)
    {
        Feedback::create($request->validated());

        return redirect('/');
    }

    public function index()
    {
        $feedbacks = Cache::tags('feedback')->remember('feedbacks', 3600, function () {
            return Feedback::latest()->get();
        });

        return view('admin.feedback.index', compact('feedbacks'));
    }
}
