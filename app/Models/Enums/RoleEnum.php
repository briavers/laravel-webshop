<?php

namespace App\Models\Enums;

class RoleEnum
{
    public const ADMIN = '0ca2234d-3291-42af-8df6-6b320d7b2882';
    public const SELLER = '5f6df727-3618-48a8-bcd3-79a0c84893c2';
    public const USER = '038720e7-1b18-42e2-aa01-623d4da34bce';

    public const NAMES = [
        self::ADMIN => 'Admin',
        self::SELLER => 'Seller',
        self::USER => 'User',
    ];

    /**
     * @param string $userRoleUuid
     *
     * @return bool
     */
    public static function isAdmin(string $userRoleUuid): bool
    {
        return ($userRoleUuid === self::ADMIN);
    }

    /**
     * @param string $userRoleUuid
     *
     * @return bool
     */
    public static function isSeller(string $userRoleUuid): bool
    {
        return ($userRoleUuid === self::SELLER);
    }


    public static function isInternal(string $userRoleUuid): bool
    {
        return ($userRoleUuid === self::SELLER || $userRoleUuid === self::ADMIN);
    }

    /**
     * @param string $userRoleUuid
     *
     * @return bool
     */
    public static function isUser(string $userRoleUuid): bool
    {
        return ($userRoleUuid === self::USER);
    }
}
