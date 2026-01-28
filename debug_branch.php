<?php

use App\Models\Branch;
use App\Models\Business;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    echo 'Creating Business...'.PHP_EOL;
    $business = Business::create([
        'name' => 'Test Business',
        'status' => 'active',
        'description' => 'Test',
    ]);
    echo 'Business ID: '.$business->id.PHP_EOL;

    echo 'Creating Branch...'.PHP_EOL;
    $branch = Branch::factory()->create(['business_id' => $business->id]);
    echo 'Branch ID: '.$branch->id.PHP_EOL;
    echo 'Success!'.PHP_EOL;
} catch (\Exception $e) {
    echo 'Error: '.$e->getMessage().PHP_EOL;
    echo $e->getTraceAsString();
}
