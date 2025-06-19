<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Kim Ngọc Huynh',
            'email' => 'huynh.kim@gmail.com',
            'password' => bcrypt('Huynh@1234'),
            'role' => 'candidate',
        ]);
    }
}
