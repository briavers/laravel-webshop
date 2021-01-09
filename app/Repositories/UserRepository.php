<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class UserRepository implements UserRepositoryInterface
{
    public function selectPaginated(
        int $perPage = 15,
        array $filters = []
    ): LengthAwarePaginator {
        return $this->getUsers($filters)
            ->paginate($perPage);
    }

    private function getUsers(array $filters = []): Builder
    {
        $queryBuilder = User::select('*')
            ->orderBy('created_at', 'desc');

        // Form filters.
        foreach ($filters as $key => $value) {
            $queryBuilder->where($key, $value['operator'], $value['value']);
        }

        return $queryBuilder;
    }
}
