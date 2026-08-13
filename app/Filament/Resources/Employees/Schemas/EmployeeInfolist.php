<?php

namespace App\Filament\Resources\Employees\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Schemas\Components\Section;

class EmployeeInfolist
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
                Section::make(__('Profile Information'))
                    ->schema([
                        TextEntry::make('role')
                            ->label(__('Role'))
                            ->badge(),
                        TextEntry::make('phone')
                            ->label(__('Phone')),
                        IconEntry::make('is_active')
                            ->label(__('Is Active'))
                            ->boolean(),
                    ])->columns(2),
            ]);
    }
}
