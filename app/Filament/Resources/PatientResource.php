<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatientResource\RelationManagers;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PatientResource\Pages;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\App;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use App\Models\Insurance;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Forms;
use App\Models\Patient;

class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';

    /**
     * ===========================================================
     * Create & Update & View Form
    */
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Personal Information')->columns(2)
                ->icon('heroicon-o-clipboard-document')
                ->schema([
                    Forms\Components\TextInput::make('first_name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('last_name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('blood_type')
                        ->options(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])
                        ->native(false),
                    Forms\Components\TextInput::make('height')
                        ->maxLength(255)
                        ->default(null),
                    Forms\Components\TextInput::make('weight')
                        ->maxLength(255)
                        ->default(null),
                    Forms\Components\Select::make('residence_type')
                        ->options([
                            'resident/citizen' => 'Resident/Citizen',
                            'visitor'          => 'Visitor', 
                            'pilgrim'          => 'Pilgrim',
                            'hajj'             => 'Hajj'
                        ])
                        ->native(false)
                        ->required(),
                    Forms\Components\TextInput::make('insurance_number')
                        ->maxLength(255)
                        ->default(null),
                    Forms\Components\Select::make('insurance_id')
                        ->options(Insurance::with('translations')->get()->pluck('name', 'id')->toArray())
                        ->label('Insurance')
                        ->native(false)
                        ->searchable()
                        ->preload(),
                    Forms\Components\Select::make('parent_id')
                        ->relationship('parent', 'id')
                        ->default(null)
                        ->native(false),
                    Forms\Components\Select::make('user_id')
                        ->relationship('user', 'id')
                        ->default(null)
                        ->native(false),
                    Forms\Components\Select::make('status')
                        ->options([
                            'active'   => 'Active',
                            'inactive' => 'Inactive', 
                        ])
                        ->native(false)
                        ->default('active')
                        ->required(),
            ]),
            Forms\Components\Section::make('Medical File')
                ->icon('heroicon-o-clipboard-document-list')
                ->schema([
                    Forms\Components\Select::make('chronic_diseases')
                        ->relationship('chronic_diseases', 'id')
                        ->getOptionLabelFromRecordUsing(fn ($record) => $record->name)
                        ->label('Chronic Diseases')
                        ->multiple()
                        ->native(false)
                        ->searchable()
                        ->preload(),
                    Forms\Components\Select::make('injuries')
                        ->relationship('injuries', 'id')
                        ->getOptionLabelFromRecordUsing(fn ($record) => $record->name)
                        ->label('Injuries')
                        ->multiple()
                        ->native(false)
                        ->searchable()
                        ->preload(),
                    Forms\Components\Select::make('surgeries')
                        ->relationship('surgeries', 'id')
                        ->getOptionLabelFromRecordUsing(fn ($record) => $record->name)
                        ->label('Surgeries')
                        ->multiple()
                        ->native(false)
                        ->searchable()
                        ->preload(),
                    Forms\Components\Select::make('allergies')
                        ->relationship('allergies', 'id')
                        ->getOptionLabelFromRecordUsing(fn ($record) => $record->name)
                        ->label('Allergies')
                        ->multiple()
                        ->native(false)  
                        ->searchable()
                        ->preload(),
                    Forms\Components\Select::make('health_goals')
                        ->relationship('health_goals', 'id')
                        ->getOptionLabelFromRecordUsing(fn ($record) => $record->name)
                        ->label('Health Goals')
                        ->multiple()
                        ->native(false)
                        ->searchable()
                        ->preload(),
                    Forms\Components\Section::make('Habits')
                        ->icon('heroicon-o-arrow-path')
                        ->schema([
                            Forms\Components\repeater::make('habitpatients')
                                ->relationship('habitpatients')
                                ->addActionLabel('Add Habit')
                                ->hiddenLabel()
                                ->columns(2)
                                ->schema([
                                    Forms\Components\Select::make('habit_id')
                                        ->label('Habit')
                                        ->options(\App\Models\Habit::all()->mapWithKeys(fn ($habit) => [$habit->id => $habit->translate(App::getLocale())->name]))
                                        ->disableOptionWhen(fn ($value, $state, \Filament\Forms\Get $get) => 
                                            collect($get('../*.habit_id'))->filter()->reject(fn ($id) => $id === $state)->contains($value))
                                        ->live()
                                        ->afterStateUpdated(fn (\Filament\Forms\Set $set) => $set('habit_choice_id', null))
                                        ->searchable()
                                        ->required(),
                                    Forms\Components\Select::make('habit_choice_id')
                                        ->label('Habit Choice')
                                        ->options(fn ($get) =>\App\Models\HabitChoice::where('habit_id', $get('habit_id'))->get()->
                                            mapWithKeys(fn($choice) => [$choice->id => $choice->translate(App::getLocale())->name]))
                                        ->searchable()
                                        ->required(),
                                ]),
                        ]),
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
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('blood_type'),
                Tables\Columns\TextColumn::make('height')
                    ->searchable(),
                Tables\Columns\TextColumn::make('weight')
                    ->searchable(),
                Tables\Columns\TextColumn::make('residence_type'),
                Tables\Columns\TextColumn::make('insurance_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('insurance.name')
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->whereHas('insurance', function ($query) use ($search) {
                            $query->whereTranslationLike('name', "%{$search}%");
                        });
                    })
                    ->sortable(query: function (Builder $query, string $direction): Builder {
                        return $query
                            ->leftJoin('insurances', 'patients.insurance_id', '=', 'insurances.id')
                            ->leftJoin('insurance_translations', function ($join) {
                                $join->on('insurances.id', '=', 'insurance_translations.insurance_id')->where('insurance_translations.locale', 'en');
                            })
                            ->orderBy('insurance_translations.name', $direction)
                            ->select('patients.*');
                    }),
                Tables\Columns\TextColumn::make('parent.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'inactive' => 'danger',
                    }),
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
                SelectFilter::make('residence_type')
                    ->options([
                        'resident/citizen' => 'Resident/Citizen',
                        'visitor'          => 'Visitor', 
                        'pilgrim'          => 'Pilgrim',
                        'hajj'             => 'Hajj'
                    ])
                    ->native(false),
                SelectFilter::make('blood_type')
                    ->options(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])
                    ->native(false),
                SelectFilter::make('insurance_id')
                    ->options(Insurance::with('translations')->get()->pluck('name', 'id')->toArray())
                    ->label('Insurance Companies')
                    ->native(false)
                    ->searchable()
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'view'   => Pages\ViewPatient::route('/{record}'),
            'edit'   => Pages\EditPatient::route('/{record}/edit'),
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
