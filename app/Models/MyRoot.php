<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyRoot extends Model
{
    use HasFactory;

    protected $fillable = [
        'departure_location',
        'destination_location',
        'transportation_mode',
    ];
}
