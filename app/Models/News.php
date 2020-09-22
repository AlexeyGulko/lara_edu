<?php

namespace App\Models;

use App\Interfaces\CanBeCommented;
use App\Interfaces\CanBePublished;
use App\Interfaces\HasTags;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model implements CanBeCommented, CanBePublished, HasTags
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'published',
        'body',
        'owner_id',
    ];

    protected $casts = ['published' => 'boolean',];

    protected $with = ['comments',];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->latest();
    }

    public function publish()
    {
        $this->update(['published' => ! $this->published]);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function getTagsAsStringAttribute()
    {
        return $this->tags->implode('name', ',');
    }

    public function modelAlias()
    {
        return 'news';
    }
}
