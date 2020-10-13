<?php

namespace App\Events;

use App\Interfaces\HasCache;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ClearCacheEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public HasCache $object;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(HasCache $object)
    {
        $this->object = $object;
    }
}
