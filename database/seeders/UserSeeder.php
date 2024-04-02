<?php

namespace Database\Seeders;

use App\Models\CertificationRequest;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleModerator=Role::findByName('selenium-moderator', 'api');
        $usersio = User::factory()->create([
            'username' => 'usersio',
            'email' => 'test@example.com',
            'password' => '12345678',
            'region_id' => 78,
            'kindness_score' => 300
        ]);

        $usersio->assignRole($roleModerator);

        $users = User::factory(49)->create();

        $users = [$usersio, ...$users];

        foreach( range(1, rand(700, 1000)) as $i){
            $user = $users[rand(0, count($users)-1)];
            $followed_user = $users[rand(0, count($users)-1)];
            DB::table('user_follow_user')->upsert([
                'user_id' => $user->id,
                'followed_user_id' => $followed_user->id,
            ],
            ['user_id', 'followed_user_id']);

            if($user->kindness_score > 249){
                CertificationRequest::create(['user_id' => $user->id]);
            }
        }

        foreach( range(1, rand(5, 15)) as $i){
            $user = $users[rand(0, count($users)-1)];
            $blacklisted_user = $users[rand(0, count($users)-1)];
            DB::table('user_blacklist_user')->upsert([
                'user_id' => $user->id,
                'blacklisted_user_id' => $blacklisted_user->id,
            ],
                ['user_id', 'blacklisted_user_id']);
        }

    }
}
