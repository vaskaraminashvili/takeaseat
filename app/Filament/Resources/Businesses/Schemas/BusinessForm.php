<?php

namespace App\Filament\Resources\Businesses\Schemas;

use App\Enums\StatusEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BusinessForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->unique(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Select::make('status')
                    ->options(StatusEnum::class)
                    ->default(StatusEnum::ACTIVE)
                    ->required(),
            ]);
    }
}
