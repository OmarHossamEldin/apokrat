<?php

namespace App\Filament\Resources\HspResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\CreateTranslatable;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\HspResource;
use Filament\Actions;

class CreateHsp extends CreateRecord
{
    use CreateTranslatable;

    protected static string $resource = HspResource::class;
}
