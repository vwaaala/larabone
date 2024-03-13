<?php

namespace Bunker\LaravelSpeedDate\database\seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SpeedDateSeeder extends Seeder
{
    public function run(): void
    {
        // table permissions
        $permissions = [
            'sd_event_create',
            'sd_event_edit',
            'sd_event_delete',
            'sd_event_show',
            'sd_vote_create',
            'sd_vote_edit',
            'sd_vote_delete',
            'sd_vote_show',
        ];

        // Looping and Inserting Array's Permissions into Permission Table
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        $super = Role::where(['name' => 'Super Admin'])->first();
        $super->givePermissionTo($permissions);
    }
}
