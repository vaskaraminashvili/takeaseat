<?php

namespace Database\Factories;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'status' => StatusEnum::ACTIVE,
        ];
    }
}
