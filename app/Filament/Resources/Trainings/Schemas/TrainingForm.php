<?php

namespace App\Filament\Resources\Trainings\Schemas;

use Filament\Schemas\Schema;

class TrainingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Training Details')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        \Filament\Forms\Components\Select::make('type')
                            ->required()
                            ->options(\App\Enums\TrainingType::class),
                        \Filament\Forms\Components\Select::make('status')
                            ->required()
                            ->options(\App\Enums\TrainingStatus::class)
                            ->default(\App\Enums\TrainingStatus::DRAFT),
                        \Filament\Forms\Components\Textarea::make('description')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                        \Filament\Forms\Components\Textarea::make('requirements')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ])->columns(2),

                \Filament\Schemas\Components\Section::make('Schedule & Location')
                    ->schema([
                        \Filament\Forms\Components\DatePicker::make('start_date')
                            ->required(),
                        \Filament\Forms\Components\DatePicker::make('end_date')
                            ->required(),
                        \Filament\Forms\Components\TextInput::make('duration_days')
                            ->required()
                            ->numeric()
                            ->minValue(1),
                        \Filament\Forms\Components\TextInput::make('location')
                            ->required()
                            ->maxLength(255),
                    ])->columns(2),

                \Filament\Schemas\Components\Section::make('Quota & Settings')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('max_quota')
                            ->required()
                            ->numeric()
                            ->default(50)
                            ->minValue(1),
                        \Filament\Forms\Components\TextInput::make('filled_quota')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->minValue(0),
                        \Filament\Forms\Components\Toggle::make('is_active')
                            ->required()
                            ->default(true),
                        \Filament\Forms\Components\KeyValue::make('metadata')
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}
