<?php

namespace Raid\Core\Filament\Traits\Panels;

use Illuminate\Support\Facades\File;

trait HasModule
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
}
