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

Route::get('/posts/tags/{tag}', 'TagController@index')
    ->name('posts.index.tags')
;

Route::resource('posts', 'PostController');


Route::post('/feedback/create', 'FeedbackController@store')
    ->name('feedback.store')
;
Route::get('/contacts', 'FeedbackController@create')
    ->name('contacts');
Route::get('/about', function () {
    return view('about');
})
    ->name('about')
;

Auth::routes();

Route::namespace('Admin')->group(function () {
    Route::get('/admin', 'AdminController@index')
        ->name('admin')
    ;
    Route::get('/admin/feedback', 'FeedbackController@index')
        ->name('admin.feedback.index')
    ;
    Route::get('/admin/posts', 'PostController@index')
        ->name('admin.posts.index')
    ;
});
Route::name('admin.')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('posts', 'PostController')
            ->except(['index', 'create', 'store']);
        Route::put('/posts/{post}/publish', 'PublishController@toggle')
            ->name('posts.publish');
    });
});


