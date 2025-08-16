<?php

namespace App\Filament\Resources\HealthGoalResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ViewTranslatable;
use App\Filament\Resources\HealthGoalResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;

class ViewHealthGoal extends ViewRecord
{
    use ViewTranslatable;

    protected static string $resource = HealthGoalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
