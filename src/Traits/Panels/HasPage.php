<?php

namespace Raid\Core\Filament\Traits\Panels;

use Filament\Pages;

trait HasPage
{
    /**
     * Add a page to the panel.
     */
    public function withDefaultPages(): static
    {
        $this->getPanel()->pages([
            Pages\Dashboard::class,
        ]);

        return $this;
    }
}
