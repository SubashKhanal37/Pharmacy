<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { {
            Permission::create(['name' => 'create-users']);
            Permission::create(['name' => 'edit-users']);
            Permission::create(['name' => 'delete-users']);

            Permission::create(['name' => 'view-users']);

            $adminRole = Role::create(['name' => 'Admin']);
            $adminRole = Role::roles('Admin')->get();
            $userRole = Role::create(['name' => 'User']);

            $adminRole->givePermissionTo([
                'create-users',
                'edit-users',
                'delete-users',
                'view-users',
            ]);

            $userRole->givePermissionTo([
                'view-users',
            ]);
        }
    }
}
