<?php

namespace App\Filament\Resources\Customers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;

class CustomersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('name')
                    ->label(__('Name'))
                    ->searchable()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('email')
                    ->label(__('Email'))
                    ->searchable()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('client_type')
                    ->label(__('Client Type'))
                    ->badge()
                    ->searchable()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('origin_institution')
                    ->label(__('Origin Institution'))
                    ->searchable(),
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
                \Filament\Tables\Filters\SelectFilter::make('client_type')
                    ->label(__('Client Type'))
                    ->options(\App\Enums\ClientType::class),
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
