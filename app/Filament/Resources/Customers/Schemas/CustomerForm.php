<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make(__('Account Information'))
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('name')
                            ->label(__('Name'))
                            ->required()
                            ->maxLength(255),
                        \Filament\Forms\Components\TextInput::make('email')
                            ->label(__('Email'))
                            ->email()
                            ->required()
                            ->maxLength(255),
                        \Filament\Forms\Components\TextInput::make('password')
                            ->label(__('Password'))
                            ->password()
                            ->dehydrateStateUsing(fn ($state) => \Illuminate\Support\Facades\Hash::make($state))
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->maxLength(255),
                    ])->columns(2),
                \Filament\Schemas\Components\Section::make(__('Personal Information'))
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('id_number')
                            ->label(__('ID Number'))
                            ->maxLength(255),
                        \Filament\Forms\Components\TextInput::make('phone')
                            ->label(__('Phone'))
                            ->tel()
                            ->maxLength(255),
                        \Filament\Forms\Components\TextInput::make('position')
                            ->label(__('Position'))
                            ->maxLength(255),
                        \Filament\Forms\Components\TextInput::make('origin_institution')
                            ->label(__('Origin Institution'))
                            ->maxLength(255),
                        \Filament\Forms\Components\Select::make('client_type')
                            ->label(__('Client Type'))
                            ->options(\App\Enums\ClientType::class)
                            ->required()
                            ->default(\App\Enums\ClientType::INDIVIDUAL),
                        \Filament\Forms\Components\Toggle::make('is_active')
                            ->label(__('Is Active'))
                            ->default(true)
                            ->required(),
                    ])->columns(2),
            ]);
    }
}
