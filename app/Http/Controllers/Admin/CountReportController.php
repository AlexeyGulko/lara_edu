<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountReportController extends Controller
{
    public function index()
    {

        dump(app());
        return view('admin.report.count.index');
    }
}
