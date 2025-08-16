<?php

namespace App\Filament\Resources\AllergyResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\CreateTranslatable;
use App\Filament\Resources\AllergyResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateAllergy extends CreateRecord
{
    use CreateTranslatable;
    
    protected static string $resource = AllergyResource::class;
}
