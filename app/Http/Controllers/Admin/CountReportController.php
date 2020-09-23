<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Service\CountReportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountReportController extends Controller
{
    public function index(CountReportService $service)
    {
        return view('admin.report.count.index', ['options' => $service->getAliases()]);
    }

    public function create(Request $request)
    {
        return $request->all();
    }
}
