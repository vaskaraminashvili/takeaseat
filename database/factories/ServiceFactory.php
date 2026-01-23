<?php

namespace Database\Factories;

use App\Models\Business;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'business_id' => Business::factory(),
            'staff_id' => Staff::factory(),
            'name' => fake()->name(),
            'description' => fake()->text(),
            'status' => fake()->regexify('[A-Za-z0-9]{100}'),
        ];
    }
}
