<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plate extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'restaurant_id',
        'image',
        'name',
        'description',
        'ingridient_description',
        'price',
        'visible',
    ];

    // public function restaurant(){
    //     return $this->belongsTo(Restaurant::class);
    // }
}