<?php

namespace App\Filament\Resources\Trainings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;

class TrainingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->searchable()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('duration_days')
                    ->numeric()
                    ->suffix(' days')
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('max_quota')
                    ->numeric()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('filled_quota')
                    ->numeric()
                    ->sortable(),
                \Filament\Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                \Filament\Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'technical' => 'Technical',
                        'managerial' => 'Managerial',
                        'functional' => 'Functional',
                    ]),
                \Filament\Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'open' => 'Open',
                        'full' => 'Full',
                        'ongoing' => 'Ongoing',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),
                \Filament\Tables\Filters\TernaryFilter::make('is_active'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
