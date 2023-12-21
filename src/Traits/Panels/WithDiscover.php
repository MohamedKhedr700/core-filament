<?php

namespace Raid\Core\Filament\Traits\Panels;

use Filament\Panel;

trait WithDiscover
{
    /**
     * Discover resources.
     */
    protected function discoverResources(Panel $panel): void
    {
        foreach (static::getModules() as $module) {

            $path = $this->getPanelPath($module, 'Resources');

//            $in = app_path("Modules/{$module}/Http/Filament/Resources");

//            $for = "Modules\\{$module}\\Http\\Filament\\Resources";

            $panel->discoverResources(in: $path, for: $path);
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