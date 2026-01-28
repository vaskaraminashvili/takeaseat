<?php

namespace App\Filament\Resources\StaffServices\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class StaffServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        Select::make('staff_id')
                            ->relationship('staff', 'first_name')
                            ->getOptionLabelFromRecordUsing(function ($record) {
                                //                                dd($record->load(['position', 'branch.business']));
                                return $record->full_name.' '.'(პოზიცია : '.$record->position->title.')'.' '.'(ბიზნესი : '.$record->branch->business->name.')';
                            })
                            ->searchable()
                            ->preload()
                            ->required()
                            ->label('Staff Member'),

                        Select::make('service_id') // this must be dependent on staff_id bevause to choose same bussness services as staff member
                        ->relationship('service', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                                Select::make('status')
                                    ->options([
                                        'active' => 'Active',
                                        'inactive' => 'Inactive',
                                    ])
                                    ->default('active')
                                    ->required(),
                            ])
                            ->label('Service'),

                        TextInput::make('price')
                            ->numeric()
                            ->prefix('₾')
                            ->required()
                            ->label('Price'),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
