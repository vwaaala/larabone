<?php

namespace Bunker\LaravelSpeedDate\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class EventRating extends Model
{
    use HasFactory;

    protected $table = "event_ratings";
    protected $fillable = [
        'user_id',
        'event_id',
        'rated_id',
        'rating'
    ];

    protected $casts = [
        'rating' => 'enum:Bunker\LaravelSpeedDate\Enums\RatingEnum',
    ];
}
