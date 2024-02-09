<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Permission;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attribute for table related to this model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'description'];

    /**
     * The attributes that will be set by SoftDeletes action
     *
     * @var array<string>
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    public function nonRemovableRole(): bool
    {
        return $this->id == config('panel.admin_role_id') || $this->id == config('panel.user_role_id');
    }

    /**
     * Define a relationship method named 'users' which returns a BelongsToMany relationship.
     * This method defines a many-to-many relationship between the current Role model and the User model.
     * It specifies that a Role can belong to many Users, and a User can have many Roles.
     * The relationship is established using the 'user_roles' pivot table.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_roles');
    }

    /**
     * Define a relationship method named 'permissions' which returns a BelongsToMany relationship.
     * This method defines a many-to-many relationship between the current Role model and the Permission model.
     * It specifies that a Role can have many Permissions, and a Permission can be associated with many Roles.
     * The relationship is established using the 'role_permissions' pivot table.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->BelongsToMany(Permission::class, 'role_permissions');
    }

    /**
     * Determine if the current role has a specific permission.
     * This method checks if the permissions collection associated with the current Role
     * contains a permission with the provided name.
     *
     * @param  string $permission The name of the permission to check for.
     * @return bool
     */
    public function hasPermission($permission): bool
    {
        return $this->permissions->contains('name', $permission);
    }
}
