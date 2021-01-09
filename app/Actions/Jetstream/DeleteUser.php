<?php

namespace App\Actions\Jetstream;

use App\Models\Address;
use App\Models\Order;
use App\Models\User;
use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function delete($user)
    {
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $this->removeIds($user);
        $user->delete();
    }

    public function removeIds(User $user){
        Address::whereUserId($user->id)->update(['user_id' => null]);
        Order::whereUserId($user->id)->update(['user_id' => null]);
    }
}
