<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    protected $fillable = [
        'business_id',
        'name',
        'status',
        'sort_order',
        'parent_id', // allow mass assignment of parent_id
    ];

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'status' => StatusEnum::class,
            'business_id' => 'integer',
            'parent_id' => 'integer', // cast parent_id
        ];
    }

}
