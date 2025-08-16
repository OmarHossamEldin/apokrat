<?php

namespace App\Filament\Resources\HspResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Table;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Forms;

class WorkSchedulesRelationManager extends RelationManager
{
    protected static string $relationship = 'work_schedules';

    public function form(Form $form): Form
    {
        return $form->columns(1)->schema([
            Forms\Components\Select::make('work_date')
                ->options([
                    'saturday'  => 'Saturday',
                    'sunday'    => 'Sunday',
                    'monday'    => 'Monday',
                    'tuesday'   => 'Tuesday',
                    'wednesday' => 'Wednesday',
                    'thursday'  => 'Thursday',
                    'friday'    => 'Friday',
                ])
                ->native(false)
                ->required(),
            Forms\Components\TimePicker::make('time_from')
                ->required(),
            Forms\Components\TimePicker::make('time_to')
                ->required(),
            Forms\Components\Toggle::make('status')
                ->default(1)
                ->required(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('work_date')
            ->columns([
                Tables\Columns\TextColumn::make('work_date'),
                Tables\Columns\TextColumn::make('time_from')->time('g:i A'),
                Tables\Columns\TextColumn::make('time_to')->time('g:i A'),
                Tables\Columns\IconColumn::make('status')->boolean(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
