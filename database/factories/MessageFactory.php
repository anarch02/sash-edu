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
        return [
            'content' => $this->faker->text,
            'sender_id' => $this->faker->numberBetween(1, 50),  // Assuming you have users and students with IDs from 1 to 50
            'sender_type' => $this->faker->randomElement(['App\Models\User', 'App\Models\Student']),
            'receiver_id' => $this->faker->numberBetween(1, 50),  // Assuming you have users, students, and groups with IDs from 1 to 50
            'receiver_type' => $this->faker->randomElement(['App\Models\User', 'App\Models\Student', 'App\Models\Group']),
        ];
    }
}
