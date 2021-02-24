<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            'name' => 'Ashok Kunwar',
            'email' => 'kunwarashok90@gmail.com',
            'password' => Hash::make('@9868576999')
        ];
        User::create($userData);
    }
}
