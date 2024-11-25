<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminPermissions = Permission::all();

        Role::UpdateOrCreate([
            'name' => 'Admin',
            'slug' => 'admin',
            'deletable' => false
        ])->permissions()->sync($adminPermissions->pluck('id'));

        Role::UpdateOrCreate([
            'name' => 'Employee',
            'slug' => 'employee',
            'deletable' => false
        ]);
        
        Role::UpdateOrCreate([
            'name' => 'User',
            'slug' => 'user',
            'deletable' => false
        ]);
    }
}
