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
use Illuminate\Support\Facades\File;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Raid\Core\Filament\Traits\Panels\HasDiscover;
use Raid\Core\Filament\Traits\Panels\HasModule;
use Raid\Core\Filament\Traits\Panels\HasPanel;
use Raid\Core\Filament\Traits\Panels\HasPath;

class AbstractPanel extends PanelProvider
{
    use HasDiscover;
    use HasModule;
    use HasPanel;
    use HasPath;

    /**
     * Get the default panel.
     */
    public function defaultPanel(Panel $panel): Panel
    {
        $this->discoverPanel($panel);
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

        return $panel
            ->colors([
                'primary' => Color::Amber,
            ])
            ->pages([
                Pages\Dashboard::class,
            ])
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
