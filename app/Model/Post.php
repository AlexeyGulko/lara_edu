<?php

namespace App\Model;

use App\Scopes\PublishScope;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'published'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected static function booted()
    {
        static::addGlobalScope(new PublishScope());
    }
}
