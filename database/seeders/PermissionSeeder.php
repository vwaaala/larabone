<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run method to create permissions.
     */
    public function run(): void
    {
        // Create permissions for user management
        Permission::insert([
            ['name' => 'create_user', 'description' => 'can create new user'],
            ['name' => 'edit_user', 'description' => 'can edit existing user'],
            ['name' => 'view_user', 'description' => 'can view user details'],
            ['name' => 'update_user', 'description' => 'can update user information'],
            ['name' => 'delete_user', 'description' => 'can delete user'],
        ]);

        // Create permissions for role management
        Permission::insert([
            ['name' => 'create_role', 'description' => 'can create new role'],
            ['name' => 'edit_role', 'description' => 'can edit existing role'],
            ['name' => 'view_role', 'description' => 'can view role details'],
            ['name' => 'update_role', 'description' => 'can update role information'],
            ['name' => 'delete_role', 'description' => 'can delete role'],
        ]);

        // Create permissions for permission management
        Permission::insert([
            ['name' => 'create_permission', 'description' => 'can create new permission'],
            ['name' => 'edit_permission', 'description' => 'can edit existing permission'],
            ['name' => 'view_permission', 'description' => 'can view permission details'],
            ['name' => 'update_permission', 'description' => 'can update permission information'],
            ['name' => 'delete_permission', 'description' => 'can delete permission'],
        ]);
    }
}
