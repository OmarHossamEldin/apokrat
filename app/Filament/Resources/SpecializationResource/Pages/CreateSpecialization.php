<?php

namespace App\Filament\Resources\SpecializationResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\CreateTranslatable;
use App\Filament\Resources\SpecializationResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateSpecialization extends CreateRecord
{
    use CreateTranslatable;

    protected static string $resource = SpecializationResource::class;
}
