<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * This method runs the database seeders to populate the database
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
        ]);
    }

}
