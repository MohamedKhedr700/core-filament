<?php

namespace Raid\Core\Filament\Traits\Panels;

use Filament\Http\Middleware\Authenticate;
use Filament\Panel;

trait HasAuthMiddleware
{
    /**
     * Add auth middleware to the panel.
     */
    public function withDefaultAuthMiddleware(Panel $panel): static
    {
        $panel->authMiddleware([
            Authenticate::class,
        ]);

        return $this;
    }
}
