<?php

namespace App\Filament\Resources\HealthGoalResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ListTranslatable;
use App\Filament\Resources\HealthGoalResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListHealthGoals extends ListRecords
{
    use ListTranslatable;
    
    protected static string $resource = HealthGoalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
