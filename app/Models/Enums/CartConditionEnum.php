<?php

namespace App\Models\Enums;

class CartConditionEnum extends AbstractEnum
{
    public const SHIPPING = 'SHIPPING';

    public static function getLabels()
    {
        return [
            self::SHIPPING => 'shipping',
        ];
    }

    public function getLabel(): string
    {
        $key = $this->type;

        return self::getLabels()[$key];
    }
}
