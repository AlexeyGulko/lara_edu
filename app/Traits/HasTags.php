<?php


namespace App\Traits;


use App\Events\ClearCacheEvent;
use App\Models\Tag;
use Illuminate\Support\Collection;
use App\Interfaces\HasTags as HasTagsClass;

trait HasTags
{
    public static function bootHasTags()
    {
        static::syncTagsEvent(function (HasTagsClass $object) {
            event(new ClearCacheEvent($object));
        });
    }

    /**
     * synchronize model tags
     *
     * @param array|string|Collection $tags
     */
    public function syncTags($tags)
    {
        if (empty($tags)) {

            $this->tags()->sync([]);
            $this->fireModelEvent('syncTags');
            return;
        }

        $tags = $this->formatRequestTags($tags);

        $existedTagIds = $this->compareWithModelTags($tags);

        $newTags = $tags->diffKeys($this->tags->keyBy('name'));

        $this->tags()->sync($this->getSyncIds($newTags, $existedTagIds));
        $this->fireModelEvent('syncTags');
    }

    protected function compareWithModelTags($tags)
    {
        return $this->tags
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
        return collect($tags)->keyBy(fn ($item) => $item);
    }

    public static function syncTagsEvent($callback)
    {
        static::registerModelEvent('syncTags', $callback);
    }
}
