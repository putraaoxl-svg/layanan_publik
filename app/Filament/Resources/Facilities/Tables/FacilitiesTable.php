<?php

namespace App\Filament\Resources\Facilities\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;

class FacilitiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('name')
                    ->label(__('Name'))
                    ->searchable()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('type')
                    ->label(__('Type'))
                    ->badge()
                    ->searchable()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('capacity')
                    ->label(__('Capacity'))
                    ->numeric()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('price_per_day')
                    ->label(__('Price Per Day'))
                    ->money('IDR')
                    ->sortable(),
                \Filament\Tables\Columns\IconColumn::make('is_active')
                    ->label(__('Is Active'))
                    ->boolean(),
                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                \Filament\Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('Updated At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('type')
                    ->label(__('Type'))
                    ->options(\App\Enums\FacilityType::class),
                \Filament\Tables\Filters\TernaryFilter::make('is_active')
                    ->label(__('Is Active')),
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
