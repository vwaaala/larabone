<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Query extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attribute for table related to this model.
     *
     * @var array<int, string>
     */
    protected $table = 'queries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['user_id', 'ticket',];

    /**
     * The attributes that will be set by SoftDeletes action
     *
     * @var array<string>
     */
    protected $dates = ['deleted_at'];
}
