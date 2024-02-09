<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
implements MustVerifyEmail {
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attribute for table related to this model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'avatar',
        'status',
        'password',
    ];

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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    /**
     * Define a relationship between the User model and the Role model.
     * This method returns a BelongsToMany relationship, indicating that a user can have multiple roles and a role can belong to multiple users.
     * The 'user_roles' table is used as the intermediate pivot table for this relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    /**
     * Check if the user has the specified role.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole($role): bool
    {
        // Check if the authenticated user has the specified role
        return $this->roles->contains('name', $role);
    }

    /**
     * Determine if the user has a specific permission.
     *
     * @param string $permission The name of the permission to check for.
     * @return bool
     */
    public function hasPermission($permission): bool
    {
        // Iterate through user's roles to check if any role has the permission
        foreach ($this->roles as $role) {
            if ($role->hasPermission($permission)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get role name(s) associated with the user.
     *
     * @return array Array of role names
     */
    public function getRoleNames(): array
    {
        // Initialize an empty array to store role names
        $roleNames = [];

        // Iterate through user's roles to retrieve role names
        foreach ($this->roles as $role) {
            $roleNames[] = $role->name;
        }

        return $roleNames;
    }


    /**
     * Check if the authenticated user is a super admin.
     *
     * @return bool Returns true if the authenticated user is a super admin, false otherwise.
     */
    public function isSuperAdmin()
    {
        // Check if the authenticated user ID matches the super admin ID configured in the application's settings
        return $this->id == config('panel.super_admin');
    }


    /**
     * Check if the authenticated user is not a super admin.
     *
     * @return bool
     */
    public function isNotSuperAdmin()
    {
        // Compare the authenticated user's ID with the super admin ID from the configuration
        return $this->id != config('panel.super_admin');
    }

    /**
     * Check if the authenticated user has the admin role.
     *
     * @return bool
     */
    public function isAdmin()
    {
        // Check if the authenticated user has the admin role based on the configured admin role ID
        return $this->roles()->where('roles.id', config('panel.admin_role_id'))->exists();
    }

}
