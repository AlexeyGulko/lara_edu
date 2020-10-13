<?php

namespace App\Service;

use App\Models\News;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class StatisticService
{
    public function publicStatistic()
    {
        return (object) [
            'posts_quantity' => Post::count(),
            'news_quantity' => News::count(),
            'user_with_the_most_posts' =>
                User::withCount('posts')
                    ->orderBy('posts_count', 'DESC')
                    ->first()
            ,
            'longest_post' => $this->longest(Post::class, 'body'),
            'shortest_post' => $this->shortest(Post::class, 'body'),
            'most_unstable_post' =>
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
    }

    //TODO extends Eloquent models

    /**
     * Get query of model ordered by lenght of field
     *
     * @param string $className
     * @param $column
     * @param string $order
     * @return Builder
     */
    public function orderByLengthOfValueInField(string $className, $column, $order = 'DESC')
    {
        //TODO fix bindings
        //binding not work, use this wisely
        return $className::selectRaw("*, LENGTH({$column}) AS length")
            ->orderBy('length', $order)
        ;
    }

    /**
     * Get model with longest value in column
     *
     * @param $className
     * @param $column
     * @return Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function longest($className, $column)
    {
        return $this->orderByLengthOfValueInField($className, $column, 'DESC')->first();
    }

    /**
     * Get model with shortest value in column
     *
     * @param $className
     * @param $column
     * @return Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function shortest($className, $column)
    {
        return $this->orderByLengthOfValueInField($className, $column, 'ASC')->first();
    }
}
