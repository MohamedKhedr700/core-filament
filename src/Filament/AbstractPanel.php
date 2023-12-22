<?php

namespace Raid\Core\Filament\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use Raid\Core\Filament\Traits\Panels\HasAuthMiddleware;
use Raid\Core\Filament\Traits\Panels\HasColor;
use Raid\Core\Filament\Traits\Panels\HasDiscover;
use Raid\Core\Filament\Traits\Panels\HasMiddleware;
use Raid\Core\Filament\Traits\Panels\HasModule;
use Raid\Core\Filament\Traits\Panels\HasPage;
use Raid\Core\Filament\Traits\Panels\HasPanel;
use Raid\Core\Filament\Traits\Panels\HasPath;
use Raid\Core\Filament\Traits\Panels\HasWidget;

abstract class AbstractPanel extends PanelProvider
{
    use HasAuthMiddleware;
    use HasColor;
    use HasDiscover;
    use HasMiddleware;
    use HasModule;
    use HasPage;
    use HasPanel;
    use HasPath;
    use HasWidget;

    /**
     * Get the default panel.
     */
    public function defaultPanel(Panel $panel): Panel
    {
        $this->discoverPanel($panel);

        $this->withDefaultColor();

        $this->withDefaultPages();

        $this->withDefaultWidgets();

        $this->withDefaultMiddleware();

        $this->withDefaultAuthMiddleware();

        return $this;
    }

    /**
     * Discover the panel resources.
     */
    public function discoverPanel(Panel $panel): static
    {
        $this->setPanel($panel);

        $this->discoverResources($panel);

        $this->discoverPages($panel);

        $this->discoverWidgets($panel);

        return $this;
    }
}
