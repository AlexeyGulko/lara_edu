<?php

namespace App;

use App\Interfaces\CanBeCommented;
use App\Interfaces\CanBeDeleted;
use App\Interfaces\CanBePublished;
use App\Scopes\PublishedScope;
use App\Traits\HasComments;
use App\Traits\HasTags;
use App\Traits\Publish;
use Illuminate\Database\Eloquent\Model;

class News extends Model implements CanBeCommented, CanBeDeleted, CanBePublished
{
    use HasTags,
        HasComments,
        Publish;

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
}
