<?php

namespace App\Jobs;

use App\Events\CountReportGenerated;
use App\Http\Requests\CountReportRequest;
use App\Mail\CountReportMail;
use App\Service\CountReportService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CountReportGeneration implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $request;
    private $user;

    /**
     * Create a new job instance.
     *
     */
    public function __construct($request, $user)
    {
        $this->request = $request;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @param CountReportService $service
     * @return void
     */
    public function handle(CountReportService $service)
    {
        $counters = $service->count($this->request);
        event(new CountReportGenerated($counters, $this->user));

        Mail::to($this->user)
            ->queue(new CountReportMail($counters))
        ;
    }
}
