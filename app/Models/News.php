<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;

/**
 * @mixin Builder
 * @property mixed|string $title
 * @property mixed|string $preview
 * @property mixed|string $text
 * @property mixed|string $image
 * @property mixed|int $counter
 * @property mixed|Carbon $date
 * @property int $id
 * @method static findOrFail(int $id)
 */
class News extends Model
{
    use HasFactory;

    /**
     * @var mixed|string
     */

    protected $fillable = [
        'title',
        'preview',
        'text',
        'counter',
        'date',
        'image',
    ];


}
