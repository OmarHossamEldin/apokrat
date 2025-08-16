<?php

namespace App\Filament\Resources;


use CactusGalaxy\FilamentAstrotomic\Forms\Components\TranslatableTabs;
use App\Filament\Resources\ActivityTypeResource\RelationManagers;
use App\Filament\Resources\ActivityTypeResource\Pages;
use CactusGalaxy\FilamentAstrotomic\TranslatableTab;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Builder;
use App\Traits\FilamentTranslationTrait;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Forms;
use App\Models\ActivityType;

class ActivityTypeResource extends Resource
{
    use FilamentTranslationTrait;
    
    protected static ?string $model = ActivityType::class;
    protected static ?string $navigationGroup = 'Medical Management';
    protected static ?int $navigationSort = 2;
    protected static ?string $recordTitleAttribute = 'translation.name';
    
    /**
     * ===========================================================
     * Create & Update & View Form
    */
    public static function form(Form $form): Form
    {
        return $form->columns(1)->schema([
            TranslatableTabs::make()->localeTabSchema(fn (TranslatableTab $tab) => [
                Forms\Components\TextInput::make($tab->makeName('name'))
                    ->required()
                    ->maxLength(255)
            ]),
            Forms\Components\Hidden::make('admin_id')->default(Auth::user()?->admin?->id),
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
                Tables\Columns\TextColumn::make('admin.name')
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->whereHas('admin', function ($query) use ($search){$query->whereLike('name', "%{$search}%");});
                    })
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListActivityTypes::route('/'),
            'create' => Pages\CreateActivityType::route('/create'),
            'view'   => Pages\ViewActivityType::route('/{record}'),
            'edit'   => Pages\EditActivityType::route('/{record}/edit'),
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
