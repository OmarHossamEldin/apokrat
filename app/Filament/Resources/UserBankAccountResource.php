<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserBankAccountResource\RelationManagers;
use App\Filament\Resources\UserBankAccountResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\SelectFilter;
use App\Traits\FilamentTranslationTrait;
use Filament\Resources\Resource;
use App\Models\UserBankAccount;
use Filament\Tables\Table;
use Filament\Forms\Form;
use Filament\Tables;
use App\Models\Bank;
use Filament\Forms;

class UserBankAccountResource extends Resource
{
    use FilamentTranslationTrait;

    protected static ?string $model = UserBankAccount::class;
    protected static ?string $navigationGroup = 'Banks Management';
    protected static ?int $navigationSort = 2;

    /**
     * ===========================================================
     * Create & Update & View Form
    */
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('owner_name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('account_number')
                ->required()
                ->maxLength(255),
            Forms\Components\Select::make('bank_id')
                ->options(Bank::with('translations')->get()->pluck('name', 'id')->toArray())
                ->label('Bank')
                ->columnSpanFull()
                ->native(false)
                ->searchable()
                ->preload()
                ->required(),
            Forms\Components\Select::make('user_id')
                ->relationship('user', 'id')
                ->required(),
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
                Tables\Columns\TextColumn::make('owner_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('account_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bank.name')
                    ->numeric()
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->whereHas('bank', function ($query) use ($search) {
                            $query->whereTranslationLike('name', "%{$search}%");
                        });
                    })
                    ->sortable(query: function (Builder $query, string $direction): Builder {
                        return $query
                            ->leftJoin('banks', 'bank_accounts.bank_id', '=', 'banks.id')
                            ->leftJoin('bank_translations', function ($join) {
                                $join->on('banks.id', '=', 'bank_translations.bank_id')->where('bank_translations.locale', 'en');
                            })
                            ->orderBy('bank_translations.name', $direction)
                            ->select('bank_accounts.*');
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
                SelectFilter::make('bank_id')
                    ->options(Bank::with('translations')->get()->pluck('name', 'id')->toArray())
                    ->label('Bank')
                    ->native(false)
                    ->searchable()
                    ->preload(),
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
            'index' => Pages\ListUserBankAccounts::route('/'),
            'create' => Pages\CreateUserBankAccount::route('/create'),
            'view' => Pages\ViewUserBankAccount::route('/{record}'),
            'edit' => Pages\EditUserBankAccount::route('/{record}/edit'),
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
