<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index()
    {
        $statistics = [
            'posts_quantity' => DB::table('posts')->count(),
            'news_quantity' => DB::table('news_items')->count(),
            'user_with_the_most_posts'    =>
                DB::table('posts')
                    ->join('users', 'posts.owner_id', 'users.id')
                    ->selectRaw('users.name, count(*) as post_count')
                    ->groupBy('owner_id')
                    ->orderBy('post_count', 'desc')
                    ->value('users.name'),
            'longest_post'  =>
                DB::table('posts')
                    ->selectRaw('slug, title, length(body) as length')
                    ->orderBy('length', 'desc')
                    ->where('published', true)
                    ->first(),
            'shortest_post' =>
                DB::table('posts')
                    ->selectRaw('slug, title, length(body) as length')
                    ->orderBy('length', 'asc')
                    ->where('published', true)
                    ->first(),
            'most_unstable_post'    =>
                DB::table('post_histories as h')
                    ->join('posts', function ($join) {
                        $join->on('h.post_id', 'posts.id')
                            ->where('posts.published', true);
                    })
                    ->selectRaw('posts.slug as slug, posts.title as title, count(*) as count')
                    ->groupBy('posts.slug')
                    ->orderBy('count', 'desc')
                    ->first(),
            'most_commented_post' =>
                DB::table('comments as c')
                    ->join('posts', function($join) {
                        $join->on('c.commentable_id', 'posts.id')
                            ->where('c.commentable_type', Post::class)
                            ->where('posts.published', true);
                    })
                    ->selectRaw('posts.slug as slug, posts.title as title, count(*) as comments_count')
                    ->groupBy('posts.slug')
                    ->orderBy('comments_count', 'desc')
                    ->first(),
            'avg_posts_per_active_user' =>
                DB::table(
                    DB::table('posts')
                        ->join('users', 'posts.owner_id', 'users.id')
                        ->selectRaw('users.name, count(*) as post_count')
                        ->groupBy('posts.owner_id')
                        ->orderBy('post_count', 'desc')
                        ->having('post_count','>', 1),
                    'p'
                )
                    ->selectRaw('ROUND(avg(p.post_count), 1)')
                    ->value('p.post_count')
        ];

        return view('statistic', compact('statistics'));
    }
}
