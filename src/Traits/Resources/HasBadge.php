<?php

namespace Raid\Core\Filament\Traits\Resources;

trait HasBadge
{
    /**
     * Get the title of the resource.
     */
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}