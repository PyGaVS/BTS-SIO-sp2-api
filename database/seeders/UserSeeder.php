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
        User::factory()->create([
            'username' => 'Test UserController',
            'email' => 'test@example.com',
            'password' => '12345678',
            'region' => 78,
            'kindness_score' => 300
        ]);

        User::factory(30)->create();
    }
}
