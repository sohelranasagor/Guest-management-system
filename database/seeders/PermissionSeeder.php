<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $moduleAppDashboard = Module::updateOrCreate(['name'=>'Admin Dashboard']);
        Permission::UpdateOrCreate([
            'module_id' => $moduleAppDashboard->id,
            'name' => 'Access Dashboard',
            'slug' => 'app.dashboard'
        ]);

        $moduleAppRole = Module::updateOrCreate(['name'=>'Role Management']);
        Permission::UpdateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Access Role',
            'slug' => 'app.roles.index'
        ]);

        Permission::UpdateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Create Role',
            'slug' => 'app.roles.create'
        ]);

        Permission::UpdateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Edit Role',
            'slug' => 'app.roles.edit'
        ]);

        Permission::UpdateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Delete Role',
            'slug' => 'app.roles.destroy'
        ]);

        $moduleAppUser = Module::updateOrCreate(['name'=>'User Management']);
        Permission::UpdateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Access User',
            'slug' => 'app.users.index'
        ]);

        Permission::UpdateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Create User',
            'slug' => 'app.users.create'
        ]);

        Permission::UpdateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Edit User',
            'slug' => 'app.users.edit'
        ]);

        Permission::UpdateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Delete User',
            'slug' => 'app.users.destroy'
        ]);
    }
}
