<?php

namespace Raid\Core\Filament\Traits\Panels;

use Filament\Widgets;

trait HasWidget
{
    /**
     * Add a widget to the panel.
     */
    public function withDefaultWidgets(): static
    {
        $this->getPanel()->widgets([
            Widgets\AccountWidget::class,
            Widgets\FilamentInfoWidget::class,
        ]);

        return $this;
    }
}
