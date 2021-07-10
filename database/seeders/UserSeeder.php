<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
                'profile_photo_path' => null,
            ],
            [
                'name' => 'Staff',
                'email' => 'staff@gmail.com',
                'password' => bcrypt('staff123'),
                'role' => 'staff',
                'profile_photo_path' => null,
            ],
            [
                'name' => 'Sendi Agustian',
                'email' => 'sendi@gmail.com',
                'password' => bcrypt('sendi123'),
                'role' => 'student',
                'profile_photo_path' => null,
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
