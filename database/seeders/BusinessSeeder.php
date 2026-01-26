<?php

namespace Database\Seeders;

use App\Enums\StatusEnum;
use App\Models\Business;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    public function run(): void
    {
        Business::create([
            'name' => 'პრესიჟი ლუქსი',
            'description' => 'კოსმეტოლოგიური ცენტრი',
            'status' => StatusEnum::ACTIVE,
        ]);
    }
}
