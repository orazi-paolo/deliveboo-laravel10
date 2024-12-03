<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'image',
        'address',
        'city',
        'VAT'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tipologies(): BelongsToMany
    {
        return $this->belongsToMany(Tipology::class);
    }

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }
    public function plates(): HasMany
    {
        return $this->hasMany(Plate::class);
    }
}