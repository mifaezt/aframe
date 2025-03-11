<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price_per_night'
    ];
}
