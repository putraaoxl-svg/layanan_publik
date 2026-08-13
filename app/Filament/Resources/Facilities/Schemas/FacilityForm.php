<?php

namespace App\Filament\Resources\Facilities\Schemas;

use Filament\Schemas\Schema;

class FacilityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make(__('Facility Details'))
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('name')
                            ->label(__('Name'))
                            ->required()
                            ->maxLength(255),
                        \Filament\Forms\Components\Select::make('type')
                            ->label(__('Type'))
                            ->options(\App\Enums\FacilityType::class)
                            ->required(),
                        \Filament\Forms\Components\Textarea::make('description')
                            ->label(__('Description'))
                            ->maxLength(65535)
                            ->columnSpanFull(),
                        \Filament\Forms\Components\TextInput::make('capacity')
                            ->label(__('Capacity'))
                            ->numeric()
                            ->minValue(1),
                        \Filament\Forms\Components\TextInput::make('price_per_day')
                            ->label(__('Price Per Day'))
                            ->numeric()
                            ->default(0)
                            ->prefix('Rp')
                            ->step('0.01'),
                        \Filament\Forms\Components\Repeater::make('photos')
                            ->label(__('Photos'))
                            ->relationship()
                            ->schema([
                                \Filament\Forms\Components\FileUpload::make('path')
                                    ->label(__('Photo'))
                                    ->image()
                                    ->directory('facilities')
                                    ->required(),
                                \Filament\Forms\Components\TextInput::make('description')
                                    ->label(__('Description'))
                                    ->maxLength(255),
                            ])
                            ->orderColumn('sort')
                            ->defaultItems(0)
                            ->columnSpanFull(),
                        \Filament\Forms\Components\Toggle::make('is_active')
                            ->label(__('Is Active'))
                            ->default(true)
                            ->required(),
                    ])->columns(2),
            ]);
    }
}
