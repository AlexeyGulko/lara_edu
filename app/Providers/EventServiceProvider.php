<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Feedback;
use App\Models\News;
use App\Models\Post;
use App\Observers\CommentObserver;
use App\Observers\FeedbackObserver;
use App\Observers\NewsObserver;
use App\Observers\PostObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Post::observe(PostObserver::class);
        News::observe(NewsObserver::class);
        Comment::observe(CommentObserver::class);
        Feedback::observe(FeedbackObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return true;
    }
}
