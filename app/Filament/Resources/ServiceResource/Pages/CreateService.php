<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\CreateTranslatable;
use App\Filament\Resources\ServiceResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateService extends CreateRecord
{
    use CreateTranslatable;

    protected static string $resource = ServiceResource::class;
}
