<?php

namespace App\Providers;

use App\Service\Webpushr;
use App\View\Components\post\Form;
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
        $this->app->singleton(Webpushr::class, function () {
            return new Webpushr(
                config('app.webpushr.apiKey'),
                config('app.webpushr.authToken')
            );
        });
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
