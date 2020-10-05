<?php

namespace App\Mail;

use App\Events\CountReportGenerated;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CountReportMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $counters;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($counters)
    {
        $this->counters = $counters;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.reports.count');
    }
}
