<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PostController@index')
    ->name('home')
;
Route::get('/tags/{tag}', 'TagController@index')
    ->name('tags.index')
;
Route::resource('posts', 'PostController');

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

Route::group(['prefix'  => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::get('/', 'AdminController@index')
        ->name('index')
    ;
    Route::resource('posts', 'PostController')
        ->except(['create', 'store'])
    ;
    Route::get('feedback', 'FeedbackController@index')
        ->name('feedback.index')
    ;
    Route::put('/posts/{post}/publish', 'PublishController@toggle')
        ->name('posts.publish')
    ;
    Route::put('/news/{news}/publish', 'PublishController@toggle')
        ->name('news.publish')
    ;
    Route::resource('news', 'NewsController')
        ->except('show')
    ;
});

Route::get('/news', 'NewsController@index')->name('news.index');
Route::get('/news/{news}', 'NewsController@show')->name('news.show');

Route::post('/news/{news}/comment', 'CommentController@store')
    ->name('news.comments.store')
;
Route::post('/posts/{post}/comment', 'CommentController@store')
    ->name('posts.comments.store')
;

Route::get('/statistic', 'StatisticController@index')->name('statistic');
