<?php

namespace Raid\Core\Enum\Traits\Provider;

trait WithEnumProvider
{
    /**
     * Register commands.
     */
    private function registerCommands(): void
    {
        $this->commands($this->commands);
    }
}
