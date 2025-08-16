<?php

namespace App\Filament\Resources\HealthGoalResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\EditTranslatable;
use App\Filament\Resources\HealthGoalResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;

class EditHealthGoal extends EditRecord
{
    use EditTranslatable;
    
    protected static string $resource = HealthGoalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
