<?php

namespace Database\Factories;

use App\Models\Business;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'city_id' => City::factory(),
            'business_id' => Business::factory(),
            'name' => fake()->name(),
            'status' => fake()->regexify('[A-Za-z0-9]{100}'),
        ];
    }
}
