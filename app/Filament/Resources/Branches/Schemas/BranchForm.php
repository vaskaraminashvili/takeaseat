<?php

namespace App\Filament\Resources\Branches\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BranchForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('city_id')
                    ->relationship('city', 'title')
                    ->required(),
                Select::make('business_id')
                    ->relationship('business', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('status')
                    ->required(),
            ]);
    }
}
