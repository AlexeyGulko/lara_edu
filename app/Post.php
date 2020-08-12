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
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function syncTags($tags)
    {
        $postTags = $this->tags->keyBy('name');
        $reqTags = $this->formatRequestTags($tags);
        $syncIds = $postTags->intersectByKeys($reqTags)->pluck('id')->toArray();
        $syncTags = $reqTags->diffKeys($tags);
        foreach ($syncTags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $syncIds[] = $tag->id;
        }
        $this->tags()->sync($syncIds);
    }

    private function formatRequestTags($tags)
    {
        if (is_string($tags)) {
            $tags = explode(',', $tags);
        }
        return collect($tags)->keyBy( function ($item) {
            return $item;
        });
    }



}
