<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;


/**
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image where(...$args)
 * @property int $product_id
 * @property string $path
 * @property bool $is_main
 * @property int $sort_order
 */
class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'path',
        'is_main',
        'sort_order',
    ];

    public function getUrlAttribute()
    {
        return Storage::url($this->path);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
