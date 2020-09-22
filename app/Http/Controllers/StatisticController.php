<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index()
    {
        $statistics = (object) [
            'posts_quantity' => Post::count(),
            'news_quantity'  => News::count(),
            'user_with_the_most_posts'    =>
                User::withCount('posts')
                    ->orderBy('posts_count', 'DESC')
                    ->first()
            ,
            'longest_post'  =>
                Post::selectRaw('*, LENGTH(body) AS length')
                    ->orderBy('length', 'DESC')
                    ->first()
            ,
            'shortest_post' =>
                Post::selectRaw('*, LENGTH(body) AS length')
                    ->orderBy('length', 'ASC')
                    ->first()
            ,
            'most_unstable_post'    =>
                Post::withCount('history')
                    ->orderBy('history_count', 'DESC')
                    ->first()
            ,
            'most_commented_post' =>
                Post::withCount('comments')
                    ->orderBy('comments_count', 'DESC')
                    ->first()
            ,
            'avg_posts_per_active_user' =>
                DB::table(User::withCount('posts'))
                    ->where('posts_count', '>', 1)
                    ->avg('posts_count')
            ,
        ];

        return view('statistic', compact('statistics'));
    }
}
