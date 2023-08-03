<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        $permissions = Permission::pluck("id");
        $role_user = UserRole::where('name', 'Admin')->first();
        if ($role_user != null)
            $role_user->permission()->sync($permissions);
    }
}
