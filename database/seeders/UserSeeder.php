<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'User One',
                'email' => 'user1@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
                'last_login_at' => now()
            ],
            [
                'name' => 'User Two',
                'email' => 'user2@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
                'last_login_at' => now()
            ],
            [
                'name' => 'User Three',
                'email' => 'user3@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
                'last_login_at' => null
            ],
            [
                'name' => 'User Four',
                'email' => 'user4@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
                'last_login_at' => null
            ],
            [
                'name' => 'User Five',
                'email' => 'user5@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
                'last_login_at' => now()
            ],
            [
                'name' => 'User Six',
                'email' => 'user6@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
                'last_login_at' => null
            ],
            [
                'name' => 'User Seven',
                'email' => 'user7@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
                'last_login_at' => now()
            ],
            [
                'name' => 'User Eight',
                'email' => 'user8@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
                'last_login_at' => null
            ],
            [
                'name' => 'User Nine',
                'email' => 'user9@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
                'last_login_at' => now()
            ],
            [
                'name' => 'User Ten',
                'email' => 'user10@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
                'last_login_at' => null
            ],
        ]);
    }
}