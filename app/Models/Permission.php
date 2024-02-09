<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class Permission extends Model
{
    use HasFactory;

    /**
     * Define a relationship between the current model and the Role model, indicating a many-to-many association.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany A BelongsToMany object representing the relationship
     */
    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        // Establish a many-to-many relationship between the current model and the Role model,
        // using the pivot table 'role_permissions'.
        return $this->belongsToMany(Role::class, 'role_permissions');
    }

}
