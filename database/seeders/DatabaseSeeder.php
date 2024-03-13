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
            \Bunker\SupportTicket\database\seeders\SupportTicketSeeder::class, // from package bunker/support-ticket
            LaraEnvSeeder::class, // from package bunker/laraenv
            \Bunker\TourismBooking\database\seeders\TourismBookingSeeder::class,
            \Bunker\LaravelSpeedDate\database\seeders\SpeedDateSeeder::class
        ]);
    }
}
