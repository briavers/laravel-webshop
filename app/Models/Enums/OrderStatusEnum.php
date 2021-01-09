<?php

namespace App\Models\Enums;

class OrderStatusEnum extends AbstractEnum
{
    public const CREATED = '6ca23f86-59ab-4254-9bf0-dbf5d7d90024';
    public const PAID = '03fb154c-1328-42d5-a1a6-c3eac1023648';
    public const PROCESSING = '5e09de4b-8425-454d-903d-4f2f64de6326';
    public const SHIPPED = '4ef319b3-b64c-4074-8d7d-1450d67b0722';
    public const RECEIVED = '68cde4ad-8517-47ba-8ee6-4a0abce0bb3b';
    public const CANCELLED = '5458229a-3b94-4cbd-b99e-c472314796c0';
    public const FAILED = 'b8d2bda4-c32b-4253-9ff1-4583f2a94950';
    public const DISPUTE = '673da4d9-382f-45af-b871-64d1e84de5cf';

    public static function getLabels()
    {
        return [
            self::CREATED => 'created',
            self::PAID => 'paid',
            self::PROCESSING => 'processing',
            self::SHIPPED => 'shipped',
            self::RECEIVED => 'received',
            self::CANCELLED => 'cancelled',
            self::FAILED => 'failed',
            self::DISPUTE => 'dispute',
        ];
    }

    public function getLabel(): string
    {
        $key = $this->type;

        return self::getLabels()[$key];
    }
}
