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
                Section::make(__('Account Information'))
                    ->schema([
                        TextEntry::make('name')
                            ->label(__('Name')),
                        TextEntry::make('email')
                            ->label(__('Email')),
                    ])->columns(2),
                Section::make(__('Personal Information'))
                    ->schema([
                        TextEntry::make('id_number')
                            ->label(__('ID Number')),
                        TextEntry::make('phone')
                            ->label(__('Phone')),
                        TextEntry::make('position')
                            ->label(__('Position')),
                        TextEntry::make('origin_institution')
                            ->label(__('Origin Institution')),
                        TextEntry::make('client_type')
                            ->label(__('Client Type'))
                            ->badge(),
                        IconEntry::make('is_active')
                            ->label(__('Is Active'))
                            ->boolean(),
                    ])->columns(2),
            ]);
    }
}
