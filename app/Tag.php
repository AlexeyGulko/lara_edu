<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];


    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function news()
    {
        return $this->morphedByMany(News::class, 'taggable');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public static function tagsCloud()
    {
        // TODO refactoring to dynamic

        return static::has('posts')
            ->orHas('news')
            ->get()
        ;
    }

    public function modelAlias()
    {
        return $this->modelAlias;
    }
}
