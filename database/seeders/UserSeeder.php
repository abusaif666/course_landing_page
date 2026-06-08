<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'role' => 'Super Admin',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '01799592795',
            'password' => Hash::make('12345678'),
        ]);
    }
}
