<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();
        $users = [
            [
                'name'  => 'Admin',
                'email'		 => 'admin@nqt.com',
                'password' 	 => '123456',
                'email_verified_at' 	 => '2023-03-24 08:33:37',
                'role'       => 'admin'
            ],
            [
                'name'  => 'User',
                'email'		 => 'user@nqt.com',
                'password' 	 => '123456',
                'email_verified_at' 	 => '2023-03-24 08:33:37',
                'role'       => 'user'
            ]
        ];

        foreach ($users as $user_item) {
            $user               = new User;
            $user->name   = $user_item['name'];
            $user->email        = $user_item['email'];
            $user->password     = bcrypt($user_item['password']);
            $user->email_verified_at     = $user_item['email_verified_at'];
            $user->save();
            $user->assignRole($user_item['role']);
        }
    }
}
