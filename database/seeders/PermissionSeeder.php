<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use App\RoleEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => PermissionEnum::MANAGE_USERS]);
        Permission::create(['name' => PermissionEnum::DELETE_CUSTOMERS]);
        Permission::create(['name' => PermissionEnum::DELETE_RESERVATIONS]);

        $role = Role::findByName(RoleEnum::Admin->value);
        $role->givePermissionTo([
            PermissionEnum::MANAGE_USERS,
            PermissionEnum::DELETE_CUSTOMERS,
            PermissionEnum::DELETE_RESERVATIONS,
    ]);
    }
}
