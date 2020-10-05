<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\News;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Service\CountReportService;
use App\Service\TagService;
use App\Service\Webpushr;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Webpushr::class, fn () =>
             new Webpushr(
                config('app.webpushr.apiKey'),
                config('app.webpushr.authToken')
             )
        );

        $this->app->singleton(TagService::class, fn () => new TagService());
        $this
            ->app
            ->singleton(
                CountReportService::class,
                fn () => new CountReportService(
                    [
                        'posts'      => Post::class,
                        'tags'       => Tag::class,
                        'news'      => News::class,
                        'users'      => User::class,
                        'comments'   => Comment::class,
                    ]
                )
            )
        ;
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
