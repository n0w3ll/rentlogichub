<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'owner_id' => $this->faker->numberBetween(1,20),
            'type' => $this->faker->randomElement(['house','parking']),
            'address' => $this->faker->address(),
            'number' => $this->faker->numberBetween(100,5000),
            'features' => $this->faker->sentence(6),
            'status' => $this->faker->randomElement(['vacant','occupied']),
            'rent' => $this->faker->numberBetween(800, 3000)
        ];
    }
}
