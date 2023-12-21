<?php

namespace Raid\Core\Enum\Enums;

use Raid\Core\Enum\Traits\Action\WithAuthAction;
use Raid\Core\Enum\Traits\Action\WithCrudAction;
use Raid\Core\Enum\Traits\Action\WithProfileAction;

class Action extends Enum
{
    use WithAuthAction,
        WithCrudAction,
        WithProfileAction;
}
