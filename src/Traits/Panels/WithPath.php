<?php

namespace Raid\Core\Filament\Traits\Panels;

trait WithPath
{
    /**
     * The panel path.
     */
    protected string $path = 'Http/Filament';

    /**
     * Get the panel path.
     */
    public function path(): string
    {
        return $this->path;
    }

    /**
     * Get the panel path.
     */
    public function getPanelPath(string $module, string $path = ''): string
    {
        return module_path($module, $this->path()."/{$path}");
    }
}