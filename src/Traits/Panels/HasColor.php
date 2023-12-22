<?php

namespace Raid\Core\Filament\Traits\Panels;

use Filament\Panel;
use Filament\Support\Colors\Color;

trait HasColor
{
    /**
     * Set panel default color.
     */
    public function withDefaultColor(): static
    {
        $this->getPanel()->colors([
            'primary' => Color::Amber,
        ]);

        return $this;
    }
}
