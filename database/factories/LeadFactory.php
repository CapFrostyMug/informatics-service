<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'phone' => fake()->e164PhoneNumber(),
            'email' => fake()->email(),
            'appeal' => fake()->text(150),
            'status_id' => fake()->numberBetween(1, 3),
        ];
    }
}
