<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $pengembangRole = Role::firstOrCreate(['name' => 'pengembang']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        
        $admin = User::firstOrCreate([
            'email' => 'admin@gmail.com',
        ], [
            'name' => 'Admin',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole($adminRole);

        
        $pengembang = User::firstOrCreate([
            'email' => 'dev@gmail.com',
        ], [
            'name' => 'Pengembang',
            'password' => Hash::make('password'),
        ]);
        $pengembang->assignRole($pengembangRole);

        
        $user = User::firstOrCreate([
            'email' => 'pemain@gmail.com',
        ], [
            'name' => 'Pemain',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($userRole);
    }
}
