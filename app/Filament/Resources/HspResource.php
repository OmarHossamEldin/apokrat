<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HspResource\RelationManagers\WorkSchedulesRelationManager;
use CactusGalaxy\FilamentAstrotomic\Forms\Components\TranslatableTabs;
use App\Filament\Resources\HspResource\RelationManagers;
use CactusGalaxy\FilamentAstrotomic\TranslatableTab;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;
use App\Filament\Resources\HspResource\Pages;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Traits\FilamentTranslationTrait;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Forms;
use App\Models\Hsp;

class HspResource extends Resource
{
    use FilamentTranslationTrait;
    
    protected static ?string $model = Hsp::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordTitleAttribute = 'translation.name';

    /**
     * ===========================================================
     * Create & Update & View Form
    */
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('General Information')->columns(2)
                ->icon('heroicon-o-clipboard-document')
                ->schema([
                    TranslatableTabs::make()->localeTabSchema(fn (TranslatableTab $tab) => [
                        Forms\Components\TextInput::make($tab->makeName('name'))
                            ->required()
                            ->maxLength(255)
                    ]),
                    TranslatableTabs::make()->localeTabSchema(fn (TranslatableTab $tab) => [
                        Forms\Components\TextInput::make($tab->makeName('tagline'))
                            ->required()
                            ->maxLength(255)
                    ]),
                    TranslatableTabs::make()->localeTabSchema(fn (TranslatableTab $tab) => [
                        Forms\Components\RichEditor::make($tab->makeName('about'))
                            ->required()
                    ])->columnSpanFull(),
                    Forms\Components\FileUpload::make('logo')
                        ->image()
                        ->columnSpanFull(),
                    Forms\Components\TextInput::make('website')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('lat')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('long')
                        ->maxLength(255),
                    Forms\Components\Select::make('status')
                        ->options([
                            'active'   => 'Active',
                            'inactive' => 'Inactive', 
                        ])
                        ->native(false)
                        ->default('active')
                        ->required(),
                    Forms\Components\Select::make('user_id')
                        ->relationship('user', 'id')
                        ->native(false)
                        ->required(),
                    Forms\Components\Select::make('activity_types')
                        ->relationship('activity_types', 'id')
                        ->getOptionLabelFromRecordUsing(fn ($record) => $record->name)
                        ->label('Activity Types')
                        ->multiple()
                        ->native(false)
                        ->searchable()
                        ->preload(),
                ]),
            Forms\Components\Section::make('Phone Numbers')
                ->icon('heroicon-o-device-phone-mobile')
                ->schema([
                    Forms\Components\Repeater::make('hsp_phone_numbers')
                        ->relationship()
                        ->addActionLabel('Add Phone Number')
                        ->columnSpanFull()
                        ->hiddenLabel()
                        ->schema([
                            PhoneInput::make('number')->initialCountry('sa')->required(),
                        ])
                ])
            ]);
    }

    /**
     * ===========================================================
     * List Table
    */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->whereTranslationLike('name', "%{$search}%");
                    })
                    ->sortable(query: function (Builder $query, string $direction): Builder {
                        return $query->orderByTranslation('name', $direction);
                    }),
                Tables\Columns\TextColumn::make('tagline')
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->whereTranslationLike('tagline', "%{$search}%");
                    })
                    ->sortable(query: function (Builder $query, string $direction): Builder {
                        return $query->orderByTranslation('tagline', $direction);
                    }),
                Tables\Columns\TextColumn::make('website')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('logo'),
                Tables\Columns\TextColumn::make('lat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('long')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active'   => 'success',
                        'inactive' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('user.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('activity_types')
                    ->relationship('activity_types', 'id')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->name)
                    ->label('Activity Type')
                    ->native(false)
                    ->searchable()
                    ->indicateUsing(fn ($state) => \App\Models\ActivityType::find($state)?->map(fn ($type) => $type->translate(app()->getLocale())->name)->implode(', '))
                    ->preload(),
                SelectFilter::make('status')
                    ->options([
                        'active'   => 'Active',
                        'inactive' => 'Inactive', 
                    ])
                    ->native(false),
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            WorkSchedulesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHsps::route('/'),
            'create' => Pages\CreateHsp::route('/create'),
            'view' => Pages\ViewHsp::route('/{record}'),
            'edit' => Pages\EditHsp::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
