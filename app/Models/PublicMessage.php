<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicMessage extends Model
{
    use HasFactory;

    protected $table = 'public_messages';

    protected $fillable = ['message', 'user_id'];
}
