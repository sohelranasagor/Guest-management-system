<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'role_id' => Role::where('slug','admin')->first()->id,
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password')
        ]);

        User::updateOrCreate([
            'role_id' => Role::where('slug','employee')->first()->id,
            'name' => 'Employee',
            'email' => 'employee@mail.com',
            'password' => Hash::make('password')
        ]);
        
        User::updateOrCreate([
            'role_id' => Role::where('slug','user')->first()->id,
            'name' => 'User',
            'email' => 'user@mail.com',
            'password' => Hash::make('password')
        ]);
    }
}
