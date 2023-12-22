<?php

namespace Raid\Core\Filament\Traits\Panels;

use Filament\Http\Middleware\Authenticate;

trait HasAuthMiddleware
{
    /**
     * Add auth middleware to the panel.
     */
    public function withDefaultAuthMiddleware(): static
    {
        $this->panel()->middleware([
            Authenticate::class,
        ]);

        return $this;
    }
}
