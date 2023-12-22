<?php

namespace Raid\Core\Filament\Traits\Panels;

use Filament\Pages;
use Filament\Panel;

trait HasPage
{
    /**
     * Add a page to the panel.
     */
    public function withDefaultPages(Panel $panel): static
    {
        $panel->pages([
            Pages\Dashboard::class,
        ]);

        return $this;
    }
}
