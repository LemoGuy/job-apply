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
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'tags' => 'laravel, api, backend',
            'email' => $this->faker->companyemail(),
            'website' => $this->faker->url(),
            'duration' => $this->faker->randomDigitNotNull(),
            'location' => $this->faker->city(),
            'description' => $this->faker->paragraph(10)
        ];
    }
}
