<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'branch_id' => Branch::factory(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'position_id' => Position::factory(),
            'status' => fake()->regexify('[A-Za-z0-9]{100}'),
        ];
    }
}
