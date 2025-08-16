<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\RelationManagers\ChildrenRelationManager;
use CactusGalaxy\FilamentAstrotomic\Forms\Components\TranslatableTabs;
use App\Filament\Resources\ServiceResource\RelationManagers;
use CactusGalaxy\FilamentAstrotomic\TranslatableTab;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ServiceResource\Pages;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\DatePicker;
use App\Traits\FilamentTranslationTrait;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Filters\Filter;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Forms;
use App\Models\Service;

class ServiceResource extends Resource
{
    use FilamentTranslationTrait;
    
    protected static ?string $model = Service::class;
    protected static ?string $navigationGroup = 'Medical Management';
    protected static ?int $navigationSort = 1;
    protected static ?string $recordTitleAttribute = 'translation.name';

    /**
     * ===========================================================
     * Create & Update & View Form
    */
    public static function form(Form $form): Form
    {
        return $form->schema([
                TranslatableTabs::make()->localeTabSchema(fn (TranslatableTab $tab) => [
                    Forms\Components\TextInput::make($tab->makeName('name'))
                        ->required()
                        ->maxLength(255)
                    ])
                    ->columnSpanFull(),
                TranslatableTabs::make()->localeTabSchema(fn (TranslatableTab $tab) => [
                    Forms\Components\RichEditor::make($tab->makeName('description'))
                        ->required()
                    ])
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('min_price')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('parent_id')
                    ->options(Service::with('translations')->get()->pluck('name', 'id')->toArray())
                    ->label('Parent')
                    ->native(false)
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\FileUpload::make('image')
                ->image()
                ->columnSpanFull(),
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
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->whereTranslationLike('name', "%{$search}%");
                    })
                    ->sortable(query: function (Builder $query, string $direction): Builder {
                        return $query->orderByTranslation('name', $direction);
                    }),
                Tables\Columns\TextColumn::make('min_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('parent.name')
                    ->default('–')
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->whereHas('parent', function ($query) use ($search) {
                            $query->whereTranslationLike('name', "%{$search}%");
                        });
                    })
                    ->sortable(query: function (Builder $query, string $direction): Builder {
                        return $query
                            ->leftJoin('services as parent', 'services.parent_id', '=', 'parent.id')
                            ->leftJoin('service_translations as parent_translations', function ($join) {
                                $join->on('parent.id', '=', 'parent_translations.service_id')->where('parent_translations.locale', 'en');
                            })
                            ->orderBy('parent_translations.name', $direction)
                            ->select('services.*');
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
                SelectFilter::make('parent_id')
                    ->options(Service::with('translations')->get()->pluck('name', 'id')->toArray())
                    ->label('Parent')
                    ->native(false)
                    ->searchable()
                    ->preload(),
                Filter::make('created_at')->form([DatePicker::make('created_from'), DatePicker::make('created_until')])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when($data['created_from'],fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date))
                            ->when($data['created_until'],fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date));
                    }),
                Tables\Filters\TrashedFilter::make()->native(false),
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
            ChildrenRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'view' => Pages\ViewService::route('/{record}'),
            'edit' => Pages\EditService::route('/{record}/edit'),
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
