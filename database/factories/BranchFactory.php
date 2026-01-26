<?php

namespace Database\Factories;

use App\Enums\StatusEnum;
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
            'business_id' => 1,
            'name' => fake()->name(),
            'status' => StatusEnum::ACTIVE,
        ];
    }
}
