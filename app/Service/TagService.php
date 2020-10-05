<?php


namespace App\Service;


use App\Interfaces\HasTags;
use App\Models\Tag;

class TagService
{
    public function sync(HasTags $model, $tags)
    {
        if (empty($tags)) {
            return;
        }

        $modelTags = $model->tags->keyBy('name');
        $reqTags = $this->formatRequestTags($tags);
        $syncIds = $modelTags->intersectByKeys($reqTags)->pluck('id')->toArray();
        $syncTags = $reqTags->diffKeys($tags);
        foreach ($syncTags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $syncIds[] = $tag->id;
        }
        $model->tags()->sync($syncIds);
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
