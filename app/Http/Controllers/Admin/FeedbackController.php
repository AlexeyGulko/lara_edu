<?php

namespace App\Http\Controllers\Admin;

use App\Feedback;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackStore;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:administrate');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $feedbacks = Feedback::latest()->get();

        return view('admin.feedback.index', compact('feedbacks'));
    }
}
