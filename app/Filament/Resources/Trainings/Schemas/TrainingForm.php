<?php

namespace App\Filament\Resources\Trainings\Schemas;

use Filament\Schemas\Schema;

class TrainingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make(__('Training Details'))
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('name')
                            ->label(__('Name'))
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        \Filament\Forms\Components\Select::make('type')
                            ->label(__('Type'))
                            ->required()
                            ->options(\App\Enums\TrainingType::class),
                        \Filament\Forms\Components\Select::make('status')
                            ->label(__('Status'))
                            ->required()
                            ->options(\App\Enums\TrainingStatus::class)
                            ->default(\App\Enums\TrainingStatus::DRAFT),
                        \Filament\Forms\Components\Textarea::make('description')
                            ->label(__('Description'))
                            ->maxLength(65535)
                            ->columnSpanFull(),
                        \Filament\Forms\Components\Textarea::make('requirements')
                            ->label(__('Requirements'))
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ])->columns(2),

                \Filament\Schemas\Components\Section::make(__('Schedule & Location'))
                    ->schema([
                        \Filament\Forms\Components\DatePicker::make('start_date')
                            ->label(__('Start Date'))
                            ->required(),
                        \Filament\Forms\Components\DatePicker::make('end_date')
                            ->label(__('End Date'))
                            ->required(),
                        \Filament\Forms\Components\TextInput::make('duration_days')
                            ->label(__('Duration Days'))
                            ->required()
                            ->numeric()
                            ->minValue(1),
                        \Filament\Forms\Components\TextInput::make('location')
                            ->label(__('Location'))
                            ->required()
                            ->maxLength(255),
                    ])->columns(2),

                \Filament\Schemas\Components\Section::make(__('Quota & Settings'))
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('max_quota')
                            ->label(__('Max Quota'))
                            ->required()
                            ->numeric()
                            ->default(50)
                            ->minValue(1),
                        \Filament\Forms\Components\TextInput::make('filled_quota')
                            ->label(__('Filled Quota'))
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->minValue(0),
                        \Filament\Forms\Components\Toggle::make('is_active')
                            ->label(__('Is Active'))
                            ->required()
                            ->default(true),
                        \Filament\Forms\Components\KeyValue::make('metadata')
                            ->label(__('Metadata'))
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}
