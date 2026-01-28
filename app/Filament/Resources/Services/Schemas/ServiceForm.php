<?php

namespace App\Filament\Resources\Services\Schemas;

use App\Enums\StatusEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('name')
                    ->required(),
                Select::make('status')
                    ->options(StatusEnum::class)
                    ->required(),

                // Select::make('business_id')
                //     ->relationship('business', 'name')
                //     ->required(),
                // Select::make('category_id')
                //     ->relationship('category', 'name')
                //     ->required(),
                // TextInput::make('name')
                //     ->required(),
                // Textarea::make('description')
                //     ->required()
                //     ->columnSpanFull(),
                // Select::make('status')
                //     ->options(StatusEnum::class)
                //     ->required(),
            ]);
    }
}
