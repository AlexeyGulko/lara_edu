<?php

namespace App\Model;

use App\Scopes\PublishScope;

/**
 * App\Model\Post
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string $description
 * @property string $body
 * @property int $published
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Post whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Post wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Post whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Post extends Model
{

    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected static function booted()
    {
        static::addGlobalScope(new PublishScope());
    }
}
