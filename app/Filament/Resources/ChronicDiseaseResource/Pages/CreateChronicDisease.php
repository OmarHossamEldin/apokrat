<?php

namespace App\Filament\Resources\ChronicDiseaseResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\CreateTranslatable;
use App\Filament\Resources\ChronicDiseaseResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateChronicDisease extends CreateRecord
{
    use CreateTranslatable;
    
    protected static string $resource = ChronicDiseaseResource::class;
}
