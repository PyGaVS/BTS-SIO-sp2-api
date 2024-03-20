<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersio = User::factory()->create([
            'username' => 'Test User',
            'email' => 'test@example.com',
            'password' => '12345678',
            'region' => 78,
            'kindness_score' => 300
        ]);

        $users = User::factory(49)->create();

        $users = [$usersio, ...$users];

        foreach( range(1, 50) as $i){
            $user = $users[rand(0, count($users)-1)];
            $followed_user = $users[rand(0, count($users)-1)];
            DB::table('user_follow_user')->insert([
                'user_id' => $user->id,
                'followed_user_id' => $followed_user->id,
            ]);
        }

    }
}
