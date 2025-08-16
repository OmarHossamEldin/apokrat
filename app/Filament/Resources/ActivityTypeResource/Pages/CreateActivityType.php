<?php

namespace App\Filament\Resources\ActivityTypeResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\CreateTranslatable;
use App\Filament\Resources\ActivityTypeResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateActivityType extends CreateRecord
{
    use CreateTranslatable;
    
    protected static string $resource = ActivityTypeResource::class;
}
