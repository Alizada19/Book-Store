<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = Role::create(['name'=>'Admin']);
        $seller = Role::create(['name'=>'Seller']);

        Permission::create(['name'=>'manage users']);
        Permission::create(['name'=>'manage categories']);
        Permission::create(['name'=>'approve sellers']);
        Permission::create(['name'=>'manage books']);
        Permission::create(['name'=>'view orders']);
        Permission::create(['name'=>'update profile']);

        $admin->givePermissionTo(Permission::all());
    }
}
