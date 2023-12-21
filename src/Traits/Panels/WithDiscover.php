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

            $in = $this->getInPath($module, 'Resources');

            $for = $this->getForPath($module, 'Resources');

            $panel->discoverResources(in: $in, for: $for);
        }
    }

    /**
     * Discover pages.
     */
    protected function discoverPages(Panel $panel): void
    {
        foreach (static::getModules() as $module) {
            $in = $this->getInPath($module, 'Pages');

            $for = $this->getForPath($module, 'Pages');

            $panel->discoverPages(in: $in, for: $for);
        }
    }

    /**
     * Discover widgets.
     */
    protected function discoverWidgets(Panel $panel): void
    {
        foreach (static::getModules() as $module) {
            $in = $this->getInPath($module, 'Widgets');

            $for = $this->getForPath($module, 'Widgets');

            $panel->discoverWidgets(in: $in, for: $for);
        }
    }
}
