<?php

namespace App\Repositories\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{
    public function selectParentPaginated(int $perPage = 15, array $filters = []): LengthAwarePaginator;

    public function selectPaginated(int $perPage = 15): LengthAwarePaginator;

    public function selectAll(): EloquentCollection;

    public function selectByParent(int $categoryId);

    public function getMenuItems(array $filters = []): Collection;

}
