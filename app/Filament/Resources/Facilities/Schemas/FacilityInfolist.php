<?php

namespace App\Filament\Resources\Facilities\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Schemas\Components\Section;

class FacilityInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('Facility Details'))
                    ->schema([
                        TextEntry::make('name')
                            ->label(__('Name')),
                        TextEntry::make('type')
                            ->label(__('Type'))
                            ->badge(),
                        TextEntry::make('capacity')
                            ->label(__('Capacity')),
                        TextEntry::make('price_per_day')
                            ->label(__('Price Per Day'))
                            ->money('IDR', locale: 'id'),
                        TextEntry::make('description')
                            ->label(__('Description'))
                            ->columnSpanFull(),
                        IconEntry::make('is_active')
                            ->label(__('Is Active'))
                            ->boolean(),
                        RepeatableEntry::make('photos')
                            ->label(__('Photos'))
                            ->schema([
                                ImageEntry::make('path')
                                    ->label(__('Photo')),
                                TextEntry::make('description')
                                    ->label(__('Description')),
                            ])
                            ->columns(2)
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}
