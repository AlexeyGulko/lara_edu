<?php


namespace App\Traits;


use App\Tag;

trait HasTags
{
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function getTagsAsStringAttribute()
    {
        return $this->tags->implode('name', ',');
    }

    public function syncTags($tags)
    {
        if (empty($tags)) {
            return;
        }
        $modelTags = $this->tags->keyBy('name');
        $reqTags = $this->formatRequestTags($tags);
        $syncIds = $modelTags->intersectByKeys($reqTags)->pluck('id')->toArray();
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
