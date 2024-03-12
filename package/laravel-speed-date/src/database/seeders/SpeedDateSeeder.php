<?php

namespace Database\Seeders;

use Bunker\SupportTicket\Models\Ticket;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SpeedDateSeeder extends Seeder
{
    public function run(): void
    {
        // table permissions
        $permissions = [
            'speed_date_create',
            'speed_date_edit',
            'speed_date_delete',
            'speed_date_show',
        ];

        // Looping and Inserting Array's Permissions into Permission Table
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        $super = Role::where(['name' => 'Super Admin'])->first();
        $super->givePermissionTo($permissions);

        // number of tickets to seed
        $numberOfTickets = 10;

        // range for user IDs
        $minUserId = 10;
        $maxUserId = 100;

        // Loop to create tickets
        for ($i = 0; $i < $numberOfTickets; $i++) {
            // Generate a random user ID within the specified range
            $userId = random_int($minUserId, $maxUserId);

            // Create a support ticket
            Ticket::create([
                'subject' => 'Support Ticket ' . ($i + 1),
                'user_id' => $userId,
                'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'status' => rand(0, 1), // Random status (true or false)
                'uuid' => str()->uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}