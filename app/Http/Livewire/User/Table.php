<?php

namespace App\Http\Livewire\User;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Livewire\Component;

class Table extends Component
{
    protected UserRepositoryInterface $userRepository;

    public function __construct($id = null)
    {
        $this->userRepository = resolve(UserRepositoryInterface::class);

        parent::__construct($id);
    }

    public function render()
    {
        //$this->authorize('viewAny', User::class);

        $users = $this->userRepository->selectPaginated();

        return view(
            'livewire.user.table',
            [
                'users' => $users,
            ]
        );
    }
}
