<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraph(),
            'job_type' => $this->faker->randomElement(['Full-time', 'Part-time', 'Contract']),
            'location' => $this->faker->city(),
            'salary_min' => $this->faker->numberBetween(30000, 80000),
            'salary_max' => $this->faker->numberBetween(80000, 150000),
            'experience_level' => $this->faker->numberBetween(0, 5),
            'open_positions' => $this->faker->numberBetween(1, 5),
        ];
    }
}