<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'address' => 'aizawl',
            'mobile' => '0000',
            'role' => 'administrator',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'dbadmin',
            'email' => 'dbadmin@gmail.com',
            'address' => 'aizawl',
            'mobile' => '0000',
            'role' => 'dbadministrator',
            'password' => Hash::make('password'),
        ]);
    }
}
