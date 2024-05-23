<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $teacher = User::where('role', User::ROLE_TEACHER)->get()->first();
        return [
            'name' => fake()->unique()->word(),
            'branch_id' => Branch::query()->inRandomOrder()->value('id'),
            'subject_id' => Subject::query()->inRandomOrder()->value('id'),
            'user_id' => $teacher->id,
            'is_active' => fake()->boolean,
        ];
    }
}
