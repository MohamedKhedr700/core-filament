<?php

namespace Raid\Core\Enum\Enums;

use Raid\Core\Enum\Traits\Enum\CaseEnum as RaidEnumTrait;
use Raid\Core\Enum\Traits\Enum\ConstEnum;

enum CaseEnum
{
    use ConstEnum,
        RaidEnumTrait;
}
