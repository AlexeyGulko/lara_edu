<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * App\Model\Model
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Model newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Model newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Model query()
 * @mixin \Eloquent
 */
abstract class Model extends Eloquent
{
    protected $guarded = [];
}
