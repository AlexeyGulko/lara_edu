<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostHistory extends Model
{
    protected $fillable = [
        'user_id',
        'before',
        'after',
    ];

    protected $casts = [
      'before' => 'array',
      'after'  => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function setBeforeAttribute($value)
    {
        $this->attributes['before'] = json_encode($value);
    }

    public function setAfterAttribute($value)
    {
        $this->attributes['after'] = json_encode($value);
    }
}
