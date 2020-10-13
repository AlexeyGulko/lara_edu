<?php


namespace App\Traits;


trait FormatingRequestedTags
{
    protected function formatTags($tags)
    {
        if (is_string($tags)) {
            $tags = explode(',', $tags);
        }

        if (is_array($tags)) {
            return collect($tags);
        }
    }
}
