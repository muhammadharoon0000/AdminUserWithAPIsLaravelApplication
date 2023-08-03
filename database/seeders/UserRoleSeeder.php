<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        UserRole::updateOrCreate([
            'name' => 'Admin'
        ], [
            'name' => 'Admin',
            'is_system' => true
        ]);
        UserRole::updateOrCreate([
            'name' => 'Customer'
        ], [
            'name' => 'Customer',
            'is_system' => false
        ]);
    }
}
