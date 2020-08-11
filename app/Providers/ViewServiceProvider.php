<?php

namespace App\Providers;

use App\Tag;
use App\View\Components\post\Form;
use Illuminate\Support\ServiceProvider;
use Blade;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['layout.sidebar'], function (\Illuminate\View\View $view) {
            $view->with('tagsCloud', Tag::tagsCloud());
        });

        Blade::component('post-form', Form::class);
    }
}
