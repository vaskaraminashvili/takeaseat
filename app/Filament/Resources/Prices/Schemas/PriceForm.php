<?php

namespace App\Filament\Resources\Prices\Schemas;

use App\Enums\StatusEnum;
use App\Models\Branch;
use App\Models\Business;
use App\Models\Service;
use App\Models\Staff;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Livewire\Component as Livewire;

class PriceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Staff')
                    ->schema([
                        Select::make('business_id')
                            ->live()
                            ->label('Business')
                            ->dehydrated(false)
                            ->options(Business::pluck('name', 'id'))
                            ->afterStateUpdated(function (Livewire $livewire) {
                                $livewire->reset('data.service_id');
                                $livewire->reset('data.branch_id');

                            }),
                        Select::make('branch_id')
                            ->placeholder(fn($get
                            ): string => empty($get('business_id')) ? 'First select Business' : 'Select an option')
                            ->options(function ($get) {
                                return Branch::where('business_id', $get('business_id'))->pluck('name', 'id');
                            })
                            ->searchable()
                            ->afterStateUpdated(function (Livewire $livewire) {
                                $livewire->reset('data.staff_id');
                            }),
                        Select::make('staff_id')
                            ->placeholder(fn($get
                            ): string => empty($get('branch_id')) ? 'First select Branch' : 'Select an option')
                            ->options(function ($get) {
                                if ($get('staff_id')) {
                                    return Staff::where('branch_id', $get('branch_id'))->pluck('first_name', 'id');

                                } else {
                                    return Staff::where('status', StatusEnum::ACTIVE);

                                }
                            })
                            ->searchable()
                            ->preload()
                            ->required(),

                    ])
                    ->columnSpanFull(),
                Section::make('Price Details')
                    ->schema([
                        Select::make('service_id')
                            ->placeholder(fn($get
                            ): string => empty($get('business_id')) ? 'First select Business' : 'Select an option')
                            ->options(function ($get) {
                                return Service::where('business_id', $get('business_id'))->pluck('name', 'id');
                            })
                            ->searchable()
                            ->required(),
                        TextInput::make('amount')
                            ->required()
                            ->numeric(),
                        Select::make('status')
                            ->options(StatusEnum::class)
                            ->default(StatusEnum::ACTIVE)
                            ->required(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
