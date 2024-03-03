<?php

namespace App\Enums;

use ReflectionClass;

class UserStatusEnum
{
    const PENDING = 'pending';
    const ACTIVE = 'active';
    const INACTIVE = 'inactive';
    const BANNED = 'banned';

    /**
     * Get all constants as an array.
     *
     * @return array
     */
    public static function toArray(): array
    {
        $class = new ReflectionClass(static::class);
        return $class->getConstants();
    }
}
