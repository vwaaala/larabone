<?php

namespace Database\Seeders;

use App\Enums\UserStatusEnum;
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
            'name' => 'Oliver Brown',
            'email' => 'super@bunk3r.net',
            'password' => bcrypt('secret')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'uuid' => str()->uuid(),
            'name' => 'Margaret Taylor',
            'email' => 'admin@bunk3r.net',
            'password' => bcrypt('secret')
        ]);
        $admin->assignRole('Admin');

        // Creating Manager User
        $manager = User::create([
            'uuid' => str()->uuid(),
            'name' => 'Joe Wilson',
            'email' => 'manager@bunk3r.net',
            'password' => bcrypt('secret')
        ]);
        $manager->assignRole('Manager');

        // Creating Normal User
        $numberOfUsers = 100;

        // Loop to create users
        for ($i = 0; $i < $numberOfUsers; $i++) {
            // Generate fake data using Faker
            $faker = \Faker\Factory::create();

            // Create a user
            $user = User::create([
                'uuid' => str()->uuid(),
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'status' => $faker->randomElement(UserStatusEnum::toArray()),
                'password' => bcrypt('secret')
            ]);

            // Output the created user
            $user->assignRole('User');
        }
    }
}
