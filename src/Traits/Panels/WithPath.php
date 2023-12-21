<?php

namespace Raid\Core\Filament\Traits\Panels;

trait WithPath
{
    /**
     * The panel in path.
     */
    protected string $inPath = 'Http/Filament';

    /**
     * The panel for path.
     */
    protected string $forPath = 'Http\\Filament';

    /**
     * Get a panel in path.
     */
    public function inPath(): string
    {
        return $this->inPath;
    }

    /**
     * Get a panel for path.
     */
    public function forPath(): string
    {
        return $this->forPath;
    }

    /**
     * Get a panel in path.
     */
    public function getInPath(string $module, string $dir = ''): string
    {
        return module_path($module, $this->inPath()."/{$dir}");
    }

    /**
     * Get a panel for path.
     */
    public function getForPath(string $module, string $dir = ''): string
    {
        return 'Modules\\'.$module.'\\'.$this->forPath()."\\".$dir;
    }
}
