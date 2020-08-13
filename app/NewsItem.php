<?php

namespace App;

use App\Scopes\PublishedScope;
use App\Traits\HasTags;
use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model
{
    use HasTags;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'published',
        'body',
        'owner_id',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    protected static function booted()
    {
        static::addGlobalScope(new PublishedScope());
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
