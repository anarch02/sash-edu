<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Group;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Branch::factory(4)->create();
        Subject::factory(2)->create();
        Group::factory(15)->create();
        Student::factory(50)->create();

        $students = Student::all();

        $groups = Group::all();

        //         $students->each(function ($student) use ($groups){
        //            $student->groups()->attach(rand(1, 5));
        //        });

        $groups->each(function ($group) use ($students) {
            $group->students()->attach($students->random(3));
        });
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => User::ROLE_ADMIN,
            'phone' => '+998908114684',
            'is_active' => true,
            'password' => bcrypt('12345678'),
        ]);
    }
}
