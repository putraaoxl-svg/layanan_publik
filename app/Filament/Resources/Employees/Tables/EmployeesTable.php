<?php

namespace App\Filament\Resources\Employees\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;

class EmployeesTable
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
                \Filament\Tables\Columns\TextColumn::make('role')
                    ->label(__('Role'))
                    ->badge()
                    ->searchable()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('phone')
                    ->label(__('Phone'))
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
                \Filament\Tables\Filters\SelectFilter::make('role')
                    ->label(__('Role'))
                    ->options(\App\Enums\EmployeeRole::class),
                \Filament\Tables\Filters\TernaryFilter::make('is_active')
                    ->label(__('Is Active')),
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
