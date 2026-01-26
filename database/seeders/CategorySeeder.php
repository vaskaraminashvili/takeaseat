<?php

namespace Database\Seeders;

use App\Enums\StatusEnum;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {

        $categories = [
            'პროცედურები ქალბატონებისთვის',
            'პროცედურები მამაკაცებისათვის',
            'ინექციური კოსმეტოლოგიის პროცედურები ქალბატონებისათვის',
            'აპარატურული კოსმეტოლოგიის პროცედურები',
        ];

        foreach ($categories as $index => $title) {
            Category::create([
                'business_id' => 1,
                'name' => $title,
                'sort_order' => $index + 1,
                'status' => StatusEnum::ACTIVE,
                'parent_id' => null,
            ]);
        }
    }
}
