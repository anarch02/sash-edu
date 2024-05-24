<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $group = Group::query()->inRandomOrder();
        return [
            'student_id'=> Student::query()->inRandomOrder()->value('id'),
            'group_id'=> $group->value('id'),
            'cost' => $group->value('cost'),
            'comment' => fake()->sentence,
            'payment_for' => fake()->date('Y-m'),
        ];
    }
}
