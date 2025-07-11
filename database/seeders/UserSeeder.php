<?php

// database/seeders/UserSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Wyatt',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Tfcvbg@.1'),
            'email_verified_at' => now(),
        ]);
    }
}
