<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreNews extends StorePost
{
    protected $binding = 'news';
    protected $table = 'news_items';
}
