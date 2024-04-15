<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $messages = Message::all();
        $message = $messages[rand(0, count($messages)-1)];
        if(substr_count($message->content, 'kys')){
            $importanceRate = 4;
        }

        return [
            'report_purpose_id' => rand(1, 6),
            'message_id' => $message->id,
            'importance_rate' => $importanceRate ?? 1
        ];
    }
}
