<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait FilamentTranslationTrait
{
    /*
     * ========================================================
     * Custom the global search resault
    */
    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->name ?? $record->title;
    }
}
