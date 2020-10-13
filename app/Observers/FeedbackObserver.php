<?php

namespace App\Observers;

use App\Models\Feedback;
use Illuminate\Support\Facades\Cache;

class FeedbackObserver
{
    /**
     * Handle the feedback "created" event.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return void
     */
    public function created(Feedback $feedback)
    {
        Cache::tags('feedback')->flush();
    }
}
