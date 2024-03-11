<?php

namespace Bunker\LaravelSpeedDate\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class DatingEvent extends Model
{
    use HasFactory;

    protected $table = "dating_events";
    protected $fillable = [
        'uuid',
        'name',
        'status',
        'active',
    ];

    protected $casts = [
        'status' => 'enum:App\Enums\EventTypeEnum',
        'active' => 'boolean',
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function participants()
    {
        return $this->hasMany(User::class);
    }
}
