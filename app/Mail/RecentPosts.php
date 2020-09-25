<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class RecentPosts extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $posts;
    public $days;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Collection $posts, $days)
    {
        $this->posts = $posts;
        $this->days  = $days;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(config('mail.from.address'))
            ->subject("Posts for last {$this->days} days")
            ->markdown('email.posts.recent');
    }
}
