<?php

namespace App\Listeners;

use App\Events\ClearCacheEvent;
use Illuminate\Support\Facades\Cache;

class ClearCacheListener
{
    /**
     * Handle the event.
     *
     * @param  ClearCacheEvent  $event
     * @return void
     */
    public function handle(ClearCacheEvent $event)
    {
        Cache::tags($event->object->cacheTags())->flush();
    }
}
