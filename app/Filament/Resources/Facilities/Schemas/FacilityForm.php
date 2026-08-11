<?php

namespace App\Filament\Resources\Facilities\Schemas;

use Filament\Schemas\Schema;

class FacilityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Facility Details')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        \Filament\Forms\Components\Select::make('type')
                            ->options(\App\Enums\FacilityType::class)
                            ->required(),
                        \Filament\Forms\Components\Textarea::make('description')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                        \Filament\Forms\Components\TextInput::make('capacity')
                            ->numeric()
                            ->minValue(1),
                        \Filament\Forms\Components\TextInput::make('price_per_day')
                            ->numeric()
                            ->default(0)
                            ->prefix('Rp')
                            ->step('0.01'),
                        \Filament\Forms\Components\Repeater::make('photos')
                            ->relationship()
                            ->schema([
                                \Filament\Forms\Components\FileUpload::make('path')
                                    ->image()
                                    ->directory('facilities')
                                    ->required(),
                                \Filament\Forms\Components\TextInput::make('description')
                                    ->maxLength(255),
                            ])
                            ->orderColumn('sort')
                            ->defaultItems(0)
                            ->columnSpanFull(),
                        \Filament\Forms\Components\Toggle::make('is_active')
                            ->default(true)
                            ->required(),
                    ])->columns(2),
            ]);
    }
}
