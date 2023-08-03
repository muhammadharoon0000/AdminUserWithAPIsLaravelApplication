<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        db::table("users")->insert([
            'name' => "adil",
            'user_id' => 3,
            'email' => "adil@gmail.com",
            'password' => Hash::make(123456789)
        ]);
    }
}
