<?php

namespace App\Filament\Resources\InsuranceResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\CreateTranslatable;
use App\Filament\Resources\InsuranceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInsurance extends CreateRecord
{
    use CreateTranslatable;
    
    protected static string $resource = InsuranceResource::class;
}
