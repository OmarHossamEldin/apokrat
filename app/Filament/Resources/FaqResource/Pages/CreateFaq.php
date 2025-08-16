<?php

namespace App\Filament\Resources\FaqResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\CreateTranslatable;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\FaqResource;
use Filament\Actions;

class CreateFaq extends CreateRecord
{
    use CreateTranslatable;
    
    protected static string $resource = FaqResource::class;
}
