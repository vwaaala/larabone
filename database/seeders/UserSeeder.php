<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $superAdmin = User::create([
            'uuid' => str()->uuid(),
            'name' => 'Syed Ahsan Kamal',
            'email' => 'super@bunk3r.net',
            'password' => bcrypt('secret')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'uuid' => str()->uuid(),
            'name' => 'Javed Ur Rehman',
            'email' => 'admin@bunk3r.net',
            'password' => bcrypt('secret')
        ]);
        $admin->assignRole('Admin');

        // Creating Manager User
        $manager = User::create([
            'uuid' => str()->uuid(),
            'name' => 'Khairul Morhsed',
            'email' => 'manager@bunk3r.net',
            'password' => bcrypt('secret')
        ]);
        $manager->assignRole('Manager');

        // Creating Product Manager User
        $user = User::create([
            'uuid' => str()->uuid(),
            'name' => 'Abdul Muqeet',
            'email' => 'users@bunk3r.net',
            'password' => bcrypt('secret')
        ]);
        $user->assignRole('User');
    }
}
