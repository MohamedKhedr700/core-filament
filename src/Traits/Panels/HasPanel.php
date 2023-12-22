<?php

namespace Raid\Core\Filament\Traits\Panels;

use Filament\Panel;

trait HasPanel
{
    /**
     * The panel.
     */
    protected Panel $panel;

    /**
     * Set a panel.
     */
    public function setPanel(Panel $panel): void
    {
        $this->panel = $panel;
    }

    /**
     * Get a panel.
     */
    public function getPanel(): Panel
    {
        return $this->panel;
    }
}
