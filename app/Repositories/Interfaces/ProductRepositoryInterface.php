<?php

namespace App\Repositories\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{
    public function selectParentPaginated(int $perPage = 15, array $filters = []): LengthAwarePaginator;

    public function selectBySlug(string $slug, int $perPage = 15, array $filters = []): LengthAwarePaginator;

    public function getPromoted($amount): Collection;

    public function getNewest($amount): Collection;


}
