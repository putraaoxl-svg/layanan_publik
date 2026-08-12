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
                Section::make('Account Information')
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('email'),
                    ])->columns(2),
                Section::make('Profile Information')
                    ->schema([
                        TextEntry::make('role')
                            ->badge(),
                        TextEntry::make('phone'),
                        IconEntry::make('is_active')
                            ->boolean(),
                    ])->columns(2),
            ]);
    }
}
