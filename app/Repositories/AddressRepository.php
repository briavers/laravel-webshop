<?php

namespace App\Repositories;

use App\Models\Address;
use App\Repositories\Interfaces\AddressRepositoryInterface;

class AddressRepository implements AddressRepositoryInterface
{
    public function createAddress(Address $address): Address
    {
        $address->save();

        return $address;
    }
}
