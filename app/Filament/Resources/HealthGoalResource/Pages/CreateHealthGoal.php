<?php

namespace App\Filament\Resources\HealthGoalResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\CreateTranslatable;
use App\Filament\Resources\HealthGoalResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateHealthGoal extends CreateRecord
{
    use CreateTranslatable;
    
    protected static string $resource = HealthGoalResource::class;
}
