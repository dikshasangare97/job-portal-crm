<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 3,
            'job_headline' => $this->faker->title(),
            'employment_type' => $this->faker->text(),
            'job_description' => $this->faker->text(),
            'key_skill' => $this->faker->text(),
            'work_experience' => $this->faker->numberBetween('0', '10'),
            'annual_salary' => $this->faker->numberBetween('100', '1000'),
            'location' => $this->faker->city(),
            'locality' => $this->faker->address(),
            'industry' => $this->faker->text(),
            'functional_area' => $this->faker->text(),
            'role' => $this->faker->text(),
            'education_qualification' => $this->faker->text(),
            'company_name' => $this->faker->company(),
            'company_detail' => $this->faker->text(),
        ];
    }
}
