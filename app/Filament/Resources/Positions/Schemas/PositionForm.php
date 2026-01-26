<?php

namespace App\Filament\Resources\Positions\Schemas;

use App\Enums\StatusEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PositionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Select::make('status')
                    ->options(StatusEnum::class)
                    ->required(),
            ]);
    }
}
