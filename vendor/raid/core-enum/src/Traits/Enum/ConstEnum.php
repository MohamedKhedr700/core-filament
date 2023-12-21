<?php

namespace Raid\Core\Enum\Traits\Enum;

use ReflectionClass;

trait ConstEnum
{
    /**
     * Get all the values of the enum constants.
     */
    public static function constants(): array
    {
        return array_values((new ReflectionClass(static::class))->getConstants());
    }

    /**
     * Determine if the enum has the given constant.
     */
    public static function hasConstant(string $constant): bool
    {
        return in_array($constant, static::constants());
    }
}
