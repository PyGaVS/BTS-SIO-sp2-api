<?php

namespace Database\Seeders;

use App\Models\Message;
use Database\Factories\MessageFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = Message::factory(200)->create();
        foreach($messages as $message){
            DB::table('chat_user')->upsert([
                'chat_id' => $message->chat_id,
                'user_id' => $message->user_id,
                'created_at' => now(),
            ], ['chat_id', 'user_id']);
        }
    }
}
