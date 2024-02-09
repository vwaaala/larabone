<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run method to create users.
     */
    public function run(): void
    {
        // Create an admin user with specified details
        $admin = User::create([
            'name' => 'Admin', 'email' => 'admin@bunk3r.net', 'password' => bcrypt('secret'),
        ]);
    
        // Create a moderator user with specified details
        $moderator = User::create([
            'name' => 'Moderator', 'email' => 'moderator@bunk3r.net', 'password' => bcrypt('secret'),
        ]);
    
        // Create a regular user with specified details
        $user = User::create([
            'name' => 'User', 'email' => 'user@bunk3r.net', 'password' => bcrypt('secret'),
        ]);

        // Retrieve the 'admin' role from the database
        $admin_role = Role::whereName('admin')->first();

        // Retrieve the 'moderator' role from the database
        $moderator_role = Role::whereName('moderator')->first();

        // Retrieve the 'user' role from the database
        $user_role = Role::whereName('user')->first();

        // Attach the 'admin' role to the $admin user
        $admin->roles()->attach($admin_role);

        // Attach the 'moderator' role to the $moderator user
        $moderator->roles()->attach($moderator_role);

        // Attach the 'user' role to the $user user
        $user->roles()->attach($user_role);

    }    
}
