<?php

namespace App\Models;

use Hamcrest\Type\IsBoolean;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use League\Flysystem\Visibility;

class Plate extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'restaurant_id',
        'image',
        'image_placeholder',
        'name',
        'description',
        'ingredient_description',
        'price',
        'visible',
    ];

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function getCapitalizedName(): string
    {
        return ucwords($this->name);
    }

    public function getTruncatedDescription($description): string
    {
        return substr($description, 0, 30) . '...';
    }

    public function getStorageImage(): string
    {
        return asset('/storage/' . $this->image);
    }

    public function purchases()
    {
        return $this->belongsToMany(Purchase::class);
    }
}
