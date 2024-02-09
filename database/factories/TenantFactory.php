<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tenant>
 */
class TenantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'identity_no' => $this->faker->numberBetween(100000, 9999999),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'agreement' => $this->faker->paragraph(2),
            'status' => $this->faker->randomElement(['free']),
        ];
    }
}
