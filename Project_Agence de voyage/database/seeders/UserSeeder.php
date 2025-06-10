<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'SuperAdmin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'role' => 'admin',
            ],
            [
                'name' => 'maryam',
                'email' => 'maryam@gmail.com',
                'password' => bcrypt('user1'),
                'role' => 'user',
            ],
            [
                'name' => 'sawab',
                'email' => 'sawab@gmail.com',
                'password' => bcrypt('user2'),
                'role' => 'user',
            ],
            [
                'name' => 'oumaima',
                'email' => 'oumaima@gmail.com',
                'password' => bcrypt('user3'),
                'role' => 'user',
            ]
        ];

        foreach ($users as $user) {
            User::firstOrCreate(
                ['email' => $user['email']],
                $user
            );
        }
    }
}
