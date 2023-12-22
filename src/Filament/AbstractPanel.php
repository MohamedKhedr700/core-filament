<?php

namespace Raid\Core\Filament\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Raid\Core\Filament\Traits\Panels\HasAuthMiddleware;
use Raid\Core\Filament\Traits\Panels\HasColor;
use Raid\Core\Filament\Traits\Panels\HasDiscover;
use Raid\Core\Filament\Traits\Panels\HasMiddleware;
use Raid\Core\Filament\Traits\Panels\HasModule;
use Raid\Core\Filament\Traits\Panels\HasPage;
use Raid\Core\Filament\Traits\Panels\HasPanel;
use Raid\Core\Filament\Traits\Panels\HasPath;
use Raid\Core\Filament\Traits\Panels\HasWidget;

class AbstractPanel extends PanelProvider
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
