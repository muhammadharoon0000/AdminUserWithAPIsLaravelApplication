<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        $routes = ["show_all_users", "add_user", "edit", "update_user", "delete_user", "show_user", "add_post", "add_permission_roles", "add_permission_and_role", "add_role_form"];


        foreach ($routes as $route) {
            Permission::updateOrCreate([
                'name' => $route
            ], [
                'name' => $route
            ]);
        }
    }
}
