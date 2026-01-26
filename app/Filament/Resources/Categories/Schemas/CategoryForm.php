<?php

namespace App\Filament\Resources\Categories\Schemas;

use App\Enums\StatusEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Category Details')
                    ->schema([
                        Select::make('business_id')
                            ->relationship('business', 'name')
                            ->required(),
                        Select::make('parent_id')
                            ->relationship('parent', 'name'),
                        TextInput::make('name')
                            ->required(),
                        Select::make('status')
                            ->options(StatusEnum::class)
                            ->default(StatusEnum::ACTIVE)
                            ->required(),
                    ]),
            ]);
    }
}
