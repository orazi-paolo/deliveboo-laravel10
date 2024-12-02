<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'image',
        'name',
        'description',
        'ingridient_description',
        'price',
        'visible',
    ];
}