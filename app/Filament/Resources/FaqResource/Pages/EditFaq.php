<?php

namespace App\Filament\Resources\FaqResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\EditTranslatable;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\FaqResource;
use Filament\Actions;

class EditFaq extends EditRecord
{
    use EditTranslatable;

    protected static string $resource = FaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
