<?php

namespace App\Policies;

use App\Models\Enums\RoleEnum;
use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User|null $user
     *
     * @return mixed
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User|null $user
     * @param Product $product
     *
     * @return mixed
     */
    public function view(?User $user, Product $product)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        $roleUuid = $user->role_uuid;
        return RoleEnum::isAdmin($roleUuid) || RoleEnum::isSeller($roleUuid);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param Product $product
     *
     * @return mixed
     */
    public function update(User $user, Product $product)
    {
        $roleUuid = $user->role_uuid;
        return RoleEnum::isAdmin($roleUuid) || RoleEnum::isSeller($roleUuid);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param Product  $product
     *
     * @return mixed
     */
    public function delete(User $user, Product $product)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User $user
     * @param  Product  $product
     *
     * @return mixed
     */
    public function restore(User $user, Product $product)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User $user
     * @param  Product  $product
     *
     * @return mixed
     */
    public function forceDelete(User $user, Product $product)
    {
        return false;
    }
}
