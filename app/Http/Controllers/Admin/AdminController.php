<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:administrate');
    }

    /**
     * @return Renderable
     */
    public function index()
    {
        return view('admin.index');
    }
}
