<?php

namespace App\Jobs;

use App\Events\CountReportGenerated;
use App\Mail\CountReportMail;
use App\Models\User;
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

    private array $counters;
    private User $user;

    /**
     * Create a new job instance.
     * @param array $counters
     * @param User $user
     */
    public function __construct(array $counters, User $user)
    {
        $this->counters = $counters;
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
        $counters = $service->count($this->counters);
        event(new CountReportGenerated($counters, $this->user));

        Mail::to($this->user)
            ->queue(new CountReportMail($counters))
        ;
    }
}
