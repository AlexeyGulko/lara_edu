<?php

namespace App\Http\Middleware;

use App\Models\News;
use App\Models\Post;
use App\Scopes\PublishedScope;
use Closure;
use Illuminate\Database\Eloquent\Model;

class EnablePublishedScope
{
    /**
     * @var Model[]
     */
    protected $models = [
        Post::class,
        News::class,
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        foreach ($this->models as $model) {
            $model::addGlobalScope(new PublishedScope());
        }

        return $next($request);
    }
}
