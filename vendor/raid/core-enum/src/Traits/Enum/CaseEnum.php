<?php

namespace Raid\Core\Enum\Traits\Enum;

use ArchTech\Enums\From;
use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Metadata;
use ArchTech\Enums\Names;
use ArchTech\Enums\Options;
use ArchTech\Enums\Values;

trait CaseEnum
{
    use InvokableCases,
        Names,
        Values,
        Options,
        From,
        Metadata;
}
