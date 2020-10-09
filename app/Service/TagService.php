<?php

namespace App\Service;

use App\Interfaces\HasTags;
use App\Models\Tag;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class TagService
{
    /**
     * synchronize model tags
     *
     * @param HasTags $model
     * @param array|string|Collection $tags
     */
    public function sync(HasTags $model, $tags)
    {
        if (empty($tags)) {
            Cache::tags(['post', 'news', 'tag'])->flush();

            $model->tags()->sync([]);
            return;
        }
        // reset cache
        Cache::tags(['post', 'news', 'tag'])->flush();

        $tags = $this->formatRequestTags($tags);

        $existedTagIds = $this->compareWithModelTags($model, $tags);

        $newTags = $tags->diffKeys($model->tags->keyBy('name'));

        $model->tags()->sync($this->getSyncIds($newTags, $existedTagIds));
    }


    protected function compareWithModelTags($model, $tags)
    {
        return $model->tags
            ->keyBy('name')
            ->interSectByKeys($tags)
            ->pluck('id')
            ->toArray()
        ;
    }

    protected function getSyncIDs($tags, $ids = [])
    {
        $syncIds = $ids;
        foreach ($tags as $tag) {
            $syncIds[] = Tag::firstOrCreate(['name' => $tag])->id;
        }
        return $syncIds;
    }


    protected function formatRequestTags($tags)
    {
        if (is_string($tags)) {
            $tags = explode(',', $tags);
        }

        if (is_array($tags)) {
            return collect($tags)->keyBy( function ($item) {
                return $item;
            });
        }

        return $tags;
    }
}
