<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class PriceFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'service_id' => Service::factory(),
            'amount' => fake()->randomFloat(0, 0, 9999999999.),
            'status' => fake()->regexify('[A-Za-z0-9]{100}'),
        ];
    }
}
