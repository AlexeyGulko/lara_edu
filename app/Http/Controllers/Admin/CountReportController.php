<?php

namespace App\Http\Controllers\Admin;

use App\Events\CountReportGenerated;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountReportRequest;
use App\Jobs\CountReportGeneration;
use App\Mail\CountReportMail;
use App\Service\CountReportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CountReportController extends Controller
{
    public function index(CountReportService $service)
    {
        return view('admin.report.count.index', ['options' => $service->getAliases()]);
    }

    public function create(CountReportRequest $request)
    {
        CountReportGeneration::dispatch($request->validated()['counters'], $request->user());
    }
}
