<?php

namespace Database\Seeders;

use Bunker\LaravelSpeedDate\database\seeders\SpeedDateSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            LaraboneSeeder::class,
            \Bunker\SupportTicket\database\seeders\SupportTicketSeeder::class, // from package bunker/support-ticket
        ]);
    }
}
