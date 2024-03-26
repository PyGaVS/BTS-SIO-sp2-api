<?php

namespace Database\Factories;

use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->userName();
        $password = Hash::make('12345678');
        $region = Region::all()->find(rand(1, 249));

        return [
            'username' => $name,
            'email' => $name.'@gmail.'.strtolower($region->short_name),
            'email_verified_at' => now(),
            'region_id' => $region->id,
            'password' => $password,
            'remember_token' => Str::random(10),
            'kindness_score' => rand(50, 300)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
