<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Cache;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function selectParentPaginated(int $perPage = 15, array $filters = []): LengthAwarePaginator
    {
        return $this->getCategories($filters)
            ->whereNull('parent_id')
            ->paginate($perPage);
    }

    public function selectPaginated(int $perPage = 15): LengthAwarePaginator
    {
        return $this->getCategories()
            ->paginate($perPage);
    }

    public function selectAll(): EloquentCollection
    {
        return $this->getCategories()->get();
    }

    public function selectByParent(int $categoryId)
    {
        return Category::whereParentId($categoryId);
    }

    public function getMenuItems(array $filters = []): Collection
    {
        return Cache::rememberForever('category-menu-items', function () {
            return Category::select('*')
                ->whereNotNull('menu')
                ->where('menu', '!=', 0)
                ->orderByDesc('menu')
                ->limit(15)
                ->get();
        });



    }

    private function getCategories(array $filters = []): Builder
    {
        $queryBuilder = Category::select('*')
            ->orderBy('slug');

        return $queryBuilder;
    }


}
