<?php

namespace App\Providers;

use App\Models\Tag;
use App\View\Components\CommentForm;
use App\View\Components\DeleteButton;
use App\View\Components\post\Form;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

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
        view()->composer(['layout.sidebar'], function (View $view) {
            $view->with('tagsCloud', Tag::tagsCloud());
        });
    }
}
