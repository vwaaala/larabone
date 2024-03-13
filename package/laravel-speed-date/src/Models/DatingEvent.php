<?php

namespace Bunker\LaravelSpeedDate\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatingEvent extends Model
{
    use HasFactory;

    // Specify the custom table name
    protected $table = "dating_events";

    // Define fillable attributes
    protected $fillable = [
        'name',
        'happens_on',
        'type',
        'status'
    ];

    // Define casting for attributes
    protected $casts = [
        'name' => 'string',
        'type' => 'enum:Bunker\LaravelSpeedDate\Enums\EventTypeEnum', // Casting 'type' attribute to enum
        'status' => 'boolean', // Casting 'status' attribute to boolean
        'happens_on' => 'datetime' // Casting 'happens_on' attribute to datetime
    ];

    // Define relationship with participants (users)
    public function participants(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class, 'event_users'); // Relationship with participants (users)
    }
}

