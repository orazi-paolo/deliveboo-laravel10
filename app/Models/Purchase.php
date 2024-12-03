<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "restaurant_id",
        "name",
        "email",
        "phone_number",
        "address",
        "city",
        "date",
        "total",
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}