<?php

namespace App\Http\Controllers;

use App\Service\StatisticService;
use Illuminate\Support\Facades\Cache;

class StatisticController extends Controller
{
    public function index(StatisticService $service)
    {
        $statistics = Cache::tags(['posts', 'news'])->remember(
            'statistic',
            3600,
            function () use ($service) {
                return $service->publicStatistic();
        });
        return view('statistic', compact('statistics'));
    }
}
