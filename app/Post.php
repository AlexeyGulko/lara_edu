<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'published',
        'body',
        'owner_id',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublished(Builder $builder)
    {
        return $builder->where('published', true);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function syncTags($tags)
    {
        if (empty($tags)) {
            return;
        }
        $postTags = $this->tags->keyBy('name');
        $reqTags = collect(explode(',', $tags))->keyBy( function ($item) {
            return $item;
        });
        $syncIds = $postTags->intersectByKeys($reqTags)->pluck('id')->toArray();
        $syncTags = $reqTags->diffKeys($tags);
        foreach ($syncTags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $syncIds[] = $tag->id;
        }
        $this->tags()->sync($syncIds);
    }
}
