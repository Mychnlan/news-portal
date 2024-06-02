<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample data for users
        $users = [
            [
                'username' => 'admin',
                'password' => bcrypt('admin123'),
                'email' => 'admin@example.com',
                'full_name' => 'Administrator',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user',
                'password' => bcrypt('user123'),
                'email' => 'user@example.com',
                'full_name' => 'Regular User',
                'role' => 'author',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
