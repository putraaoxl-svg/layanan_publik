<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Account Information')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        \Filament\Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        \Filament\Forms\Components\TextInput::make('password')
                            ->password()
                            ->dehydrateStateUsing(fn ($state) => \Illuminate\Support\Facades\Hash::make($state))
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->maxLength(255),
                    ])->columns(2),
                \Filament\Schemas\Components\Section::make('Personal Information')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('id_number')
                            ->maxLength(255),
                        \Filament\Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->maxLength(255),
                        \Filament\Forms\Components\TextInput::make('position')
                            ->maxLength(255),
                        \Filament\Forms\Components\TextInput::make('origin_institution')
                            ->maxLength(255),
                        \Filament\Forms\Components\Select::make('client_type')
                            ->options(\App\Enums\ClientType::class)
                            ->required()
                            ->default(\App\Enums\ClientType::INDIVIDUAL),
                        \Filament\Forms\Components\Toggle::make('is_active')
                            ->default(true)
                            ->required(),
                    ])->columns(2),
            ]);
    }
}
