<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Schemas\Components\Section;

class CustomerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Account Information')
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('email'),
                    ])->columns(2),
                Section::make('Personal Information')
                    ->schema([
                        TextEntry::make('id_number'),
                        TextEntry::make('phone'),
                        TextEntry::make('position'),
                        TextEntry::make('origin_institution'),
                        TextEntry::make('client_type')
                            ->badge(),
                        IconEntry::make('is_active')
                            ->boolean(),
                    ])->columns(2),
            ]);
    }
}
