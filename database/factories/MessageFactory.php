<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if(rand(1, 10) == 10){
            $content = "kys";
        } else {
            $content = fake()->realText().' '.fake()->emoji();
        }
        return [
            'content' => $content,
            'user_id' => rand(1, 11),
            'chat_id' => rand(1, 11),
        ];
    }
}
