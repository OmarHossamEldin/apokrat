<?php

namespace App\Filament\Widgets;

use App\Models\Service;
use Filament\Forms\Components\Builder;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestAppointmentTable extends BaseWidget
{
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(Service::query())
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('min_price')
                    ->numeric(),
                Tables\Columns\TextColumn::make('parent.name')
                    ->default('–'),
            ]);
    }
}
