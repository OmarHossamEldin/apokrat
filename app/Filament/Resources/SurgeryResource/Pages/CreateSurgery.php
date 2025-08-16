<?php

namespace App\Filament\Resources\SurgeryResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\CreateTranslatable;
use App\Filament\Resources\SurgeryResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateSurgery extends CreateRecord
{
    use CreateTranslatable;
    
    protected static string $resource = SurgeryResource::class;
}
