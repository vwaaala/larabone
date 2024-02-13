<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'role_management',
            'role_create',
            'role_edit',
            'role_delete',
            'role_show',
            'user_management',
            'user_create',
            'user_edit',
            'user_delete',
            'user_show',
            'user_access',
         ];
        $super = Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $user = Role::create(['name' => 'User']);
        $super->givePermissionTo([
            'role_management',
            'role_create',
            'role_edit',
            'role_delete',
            'role_show',
            'user_management',
            'user_create',
            'user_edit',
            'user_delete',
            'user_show',
            'user_access',
        ]);
        $admin->givePermissionTo([
            'user_management',
            'user_create',
            'user_edit',
            'user_delete',
            'user_show',
            'user_access',
        ]);

        $user->givePermissionTo([
            'user_access',
        ]);
    }
}
