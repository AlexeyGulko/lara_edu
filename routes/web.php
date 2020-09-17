<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'middleware' => ['published.scope']
    ],
    function () {
        Route::get('/', 'PostController@index')
            ->name('home')
        ;
        Route::get('/tags/{tag}', 'TagController@index')
            ->name('tags.index')
        ;
        Route::resource('posts', 'PostController');

        Route::resource('news','NewsController')->only('index', 'show');

        Route::post('/news/{news}/comment', 'CommentController@store')
            ->name('news.comments.store')
        ;
        Route::post('/posts/{post}/comment', 'CommentController@store')
            ->name('posts.comments.store')
        ;
        Route::get('/statistic', 'StatisticController@index')->name('statistic');
    }
);

Route::group(
    [
        'prefix'     => 'admin',
        'as'         => 'admin.',
        'middleware' => ['can:administrate', 'auth',]
    ],
    function () {
        Route::get('feedback', 'FeedbackController@index')
            ->name('feedback.index')
        ;
        Route::resource('posts', 'PostController')
            ->only(['edit'])
        ;
        Route::resource('posts', 'PostController')
            ->only(['update', 'destroy'])
            ->middleware('redirect.to:admin.posts.index')
        ;
        Route::resource('news', 'NewsController')
            ->only(['update', 'destroy', 'store'])
            ->middleware('redirect.to:admin.news.index')
        ;
        Route::namespace('Admin')->group(function () {
            Route::get('/', 'AdminController@index')
                ->name('index')
            ;
            Route::resource('posts', 'PostController')
                ->only(['edit', 'index'])
            ;
            Route::resource('news', 'NewsController')
                ->only(['edit', 'index', 'create'])
            ;
        });
    }
);

Route::group(
    [
        'middleware' => ['can:administrate', 'auth',]
    ],
    function () {
        Route::put('/posts/{post}/publish', 'PublishController@toggle')
            ->name('posts.publish')
        ;
        Route::put('/news/{news}/publish', 'PublishController@toggle')
            ->name('news.publish')
        ;
    }
);

Route::post('/feedback/create', 'FeedbackController@store')
    ->name('feedback.store')
;
Route::get('/contacts', 'FeedbackController@create')
    ->name('contacts')
;
Route::get('/about', function () {
    return view('about');
})
    ->name('about')
;

Auth::routes();
