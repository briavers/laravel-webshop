<?php

namespace App\Models\Enums;

use ReflectionClass;
use InvalidArgumentException;

abstract class AbstractEnum
{
    protected $type;

    public function __construct(string $type)
    {
        if (!in_array($type, static::getTypes())) {
            $refl = new ReflectionClass(static::class);

            throw new InvalidArgumentException(sprintf('Invalid %s "%s"', $refl->getShortName(), $type));
        }

        $this->type = $type;
    }

    public static function getTypes(): array
    {
        $constants = (new ReflectionClass(static::class))->getConstants();

        return array_values($constants);
    }

    public function isType(string $type): bool
    {
        return $this->type === $type;
    }

    public function __toString(): string
    {
        return $this->type;
    }
}
