<?php

namespace Raid\Core\Filament\Traits\Panels;

use Filament\Panel;
use Filament\Widgets;

trait HasWidget
{
    /**
     * Add a widget to the panel.
     */
    public function withDefaultWidgets(Panel $panel): static
    {
        $panel->widgets([
            Widgets\AccountWidget::class,
        ]);

        return $this;
    }
}
