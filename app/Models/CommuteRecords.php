<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommuteRecords extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'departure_location',
        'destination_location',
        'transportation_mode',
        'departure_time',
        'arrival_time',
        'weather',
    ];
}
