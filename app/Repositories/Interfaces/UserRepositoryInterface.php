<?php

namespace App\Repositories\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function selectPaginated(
        int $perPage = 15,
        array $filters = []
    ): LengthAwarePaginator;
}
