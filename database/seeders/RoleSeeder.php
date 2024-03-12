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
            'dashboard',
            'permission_show',
            'role_create',
            'role_edit',
            'role_delete',
            'role_show',
            'user_create',
            'user_edit',
            'user_delete',
            'user_show'
         ];
        $super = Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $manager = Role::create(['name' => 'Manager']);
        $user = Role::create(['name' => 'User']);
        $super->givePermissionTo($permissions);
        $admin->givePermissionTo([
            'dashboard',
            'user_create',
            'user_edit',
            'user_delete',
            'user_show'
        ]);

        $manager->givePermissionTo([
            'dashboard',
            'user_show'
        ]);

        $user->givePermissionTo([
            'dashboard'
        ]);
    }
}
