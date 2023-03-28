<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'User1',
            'email' => 'demo@recipe.local',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name' => 'User2',
            'email' => 'demo2@recipe.local',
            'password' => bcrypt('123456'),
        ]);
    }
}
