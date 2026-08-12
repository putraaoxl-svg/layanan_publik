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
                Section::make('Facility Details')
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('type')
                            ->badge(),
                        TextEntry::make('capacity'),
                        TextEntry::make('price_per_day')
                            ->money('IDR', locale: 'id'),
                        TextEntry::make('description')
                            ->columnSpanFull(),
                        IconEntry::make('is_active')
                            ->boolean(),
                        RepeatableEntry::make('photos')
                            ->schema([
                                ImageEntry::make('path')->label('Photo'),
                                TextEntry::make('description'),
                            ])
                            ->columns(2)
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}
