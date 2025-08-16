<?php

namespace App\Filament\Resources\ServiceResource\RelationManagers;

use CactusGalaxy\FilamentAstrotomic\Forms\Components\TranslatableTabs;
use Filament\Resources\RelationManagers\RelationManager;
use CactusGalaxy\FilamentAstrotomic\TranslatableTab;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Table;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Forms;
use App\Models\Service;

class ChildrenRelationManager extends RelationManager
{
    protected static string $relationship = 'children';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TranslatableTabs::make()->localeTabSchema(fn (TranslatableTab $tab) => [
                    Forms\Components\TextInput::make($tab->makeName('name'))
                    ->required()
                    ->maxLength(255)
                ])->columnSpanFull(),
                TranslatableTabs::make()->localeTabSchema(fn (TranslatableTab $tab) => [
                    Forms\Components\RichEditor::make($tab->makeName('description'))
                    ->required()
                ])->columnSpanFull(),
                Forms\Components\TextInput::make('min_price')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('parent_id')
                    ->options(Service::with('translations')->get()->pluck('name', 'id')->toArray())
                    ->label('Parent')
                    ->native(false)
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\FileUpload::make('image')
                ->columnSpanFull()
                ->image(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('min_price')
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->whereTranslationLike('name', "%{$search}%");
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('min_price')
                    ->numeric()
                    ->sortable(),
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
