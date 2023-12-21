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

class AbstractPanel extends PanelProvider
{
    /**
     * Registered modules.
     */
    protected static array $modules;

    /**
     * Get registered modules.
     */
    public static function getModules(): array
    {
        if (! isset(static::$modules)) {
            $modules = json_decode(File::get(base_path('modules_statuses.json')), true);

            static::$modules = array_keys(array_filter($modules, function (bool $status) {
                return $status;
            }));
        }

        return static::$modules;
    }

    public function panel(Panel $panel): Panel
    {
        $this->discoverResources($panel);

        $this->discoverPages($panel);

        $this->discoverWidgets($panel);

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

    /**
     * Discover resources.
     */
    protected function discoverResources(Panel $panel): void
    {
        foreach (static::getModules() as $module) {
            $in = app_path("Modules/{$module}/Http/Filament/Resources");

            $for = "Modules\\{$module}\\Http\\Filament\\Resources";

            $panel->discoverResources(in: $in, for: $for);
        }
    }

    /**
     * Discover pages.
     */
    protected function discoverPages(Panel $panel): void
    {
        foreach (static::getModules() as $module) {
            $in = app_path("Modules/{$module}/Http/Filament/Pages");

            $for = "Modules\\{$module}\\Http\\Filament\\Pages";

            $panel->discoverPages(in: $in, for: $for);
        }
    }

    /**
     * Discover widgets.
     */
    protected function discoverWidgets(Panel $panel): void
    {
        foreach (static::getModules() as $module) {
            $in = app_path("Modules/{$module}/Http/Filament/Widgets");

            $for = "Modules\\{$module}\\Http\\Filament\\Widgets";

            $panel->discoverWidgets(in: $in, for: $for);
        }
    }
}
