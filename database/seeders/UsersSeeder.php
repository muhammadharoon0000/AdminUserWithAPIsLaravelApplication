<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate([
            'name' => 'Admin',
        ], [
            'name' => 'Admin',
            'user_id' => 1,
            'email' => 'admin@gmail.com',
            'password' => Hash::make(787898)
        ]);
        User::updateOrCreate([
            'name' => 'Customer',
        ], [
            'name' => 'Customer',
            'user_id' => 2,
            'email' => 'customer@gmail.com',
            'password' => Hash::make(787898)
        ]);
    }
}
