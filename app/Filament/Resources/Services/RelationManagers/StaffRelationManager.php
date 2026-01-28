<?php

namespace App\Filament\Resources\Services\RelationManagers;

use App\Filament\Resources\Services\ServiceResource;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StaffRelationManager extends RelationManager
{
    protected static string $relationship = 'staff';

    protected static ?string $relatedResource = ServiceResource::class;

    public function isReadOnly(): bool
    {
        return false;
    }

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
            ])
            ->columns([
                TextColumn::make('full_name'),
            ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('full_name')
                ->required(),
        ]);
    }
}
