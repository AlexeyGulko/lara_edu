<?php

namespace App\Providers;

use App\Tag;
use App\View\Components\CommentForm;
use App\View\Components\DeleteButton;
use App\View\Components\post\Form;
use App\View\Components\TagItem;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Blade::component('delete-button', DeleteButton::class);
        Blade::component('tag-item', TagItem::class);
        Blade::component('comment-form', CommentForm::class);
    }
}
