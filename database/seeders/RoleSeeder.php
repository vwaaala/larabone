<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run method to create roles.
     */
    public function run(): void
    {
        // Create 'Admin' role
        Role::create(['name' => 'Admin']);

        // Create 'Moderator' role
        Role::create(['name' => 'Moderator']);

        // Create 'Customer' role
        Role::create(['name' => 'Customer']);
    }
}
