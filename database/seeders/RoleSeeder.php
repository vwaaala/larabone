<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run method to create roles.
     */
    public function run(): void
    {
        // Create 'Admin' role
        $admin_role = Role::create(['name' => 'admin']);

        // Create 'Moderator' role
        $moderator_role = Role::create(['name' => 'moderator']);

        // Create 'User' role
        $user_role = Role::create(['name' => 'user']);

        // Retrieving permission objects for various actions related to permissions
        $create_permission_permission = Permission::whereName('create_permission')->first();
        $view_permission_permission = Permission::whereName('view_permission')->first();
        $edit_permission_permission = Permission::whereName('edit_permission')->first();
        $update_permission_permission = Permission::whereName('update_permission')->first();
        $delete_permission_permission = Permission::whereName('delete_permission')->first();

        // Retrieving permission objects for various actions related to roles
        $create_role_permission = Role::whereName('create_role')->first();
        $view_role_permission = Role::whereName('view_role')->first();
        $edit_role_permission = Role::whereName('edit_role')->first();
        $update_role_permission = Role::whereName('update_role')->first();
        $delete_role_permission = Role::whereName('delete_role')->first();

        // Retrieving permission objects for various actions related to users
        $create_user_permission = User::whereName('create_user')->first();
        $view_user_permission = User::whereName('view_user')->first();
        $edit_user_permission = User::whereName('edit_user')->first();
        $update_user_permission = User::whereName('update_user')->first();
        $delete_user_permission = User::whereName('delete_user')->first();
        $self_view_user_permission = User::whereName('self_view_user')->first();
        $self_edit_user_permission = User::whereName('self_edit_user')->first();
        $self_update_user_permission = User::whereName('self_update_user')->first();

        // Attach permissions related to permissions management on admin role
        $admin_role->permissions()->attach($create_permission_permission);
        $admin_role->permissions()->attach($edit_permission_permission);
        $admin_role->permissions()->attach($view_permission_permission);
        $admin_role->permissions()->attach($update_permission_permission);
        $admin_role->permissions()->attach($delete_permission_permission);

        // Attach permissions related to role management on admin role
        $admin_role->permissions()->attach($create_role_permission);
        $admin_role->permissions()->attach($edit_role_permission);
        $admin_role->permissions()->attach($view_role_permission);
        $admin_role->permissions()->attach($update_role_permission);
        $admin_role->permissions()->attach($delete_role_permission);

        // Attach permissions related to user management on admin role
        $admin_role->permissions()->attach($create_user_permission);
        $admin_role->permissions()->attach($edit_user_permission);
        $admin_role->permissions()->attach($view_user_permission);
        $admin_role->permissions()->attach($update_user_permission);
        $admin_role->permissions()->attach($delete_user_permission);

        // Attach permissions related to user management on moderator role
        $moderator_role->permissions()->attach($create_user_permission);
        $moderator_role->permissions()->attach($edit_user_permission);
        $moderator_role->permissions()->attach($view_user_permission);
        $moderator_role->permissions()->attach($update_user_permission);
        $moderator_role->permissions()->attach($delete_user_permission);

        // Attach permissions related to user management on user role
        $user_role->permissions()->attach($self_edit_user_permission);
        $user_role->permissions()->attach($self_update_user_permission);
        $user_role->permissions()->attach($self_view_user_permission);
    }
}
