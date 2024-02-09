<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run method to create users.
     */
    public function run(): void
    {
        // Create an admin user with specified details
        User::create([
            'name' => 'Admin', 'email' => 'admin@bunk3r.net', 'password' => bcrypt('secret'),
        ]);
    
        // Create a moderator user with specified details
        User::create([
            'name' => 'Moderator', 'email' => 'moderator@bunk3r.net', 'password' => bcrypt('secret'),
        ]);
    
        // Create a regular user with specified details
        User::create([
            'name' => 'User', 'email' => 'user@bunk3r.net', 'password' => bcrypt('secret'),
        ]);
    }    
}
