<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Enums\RoleEnum;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class ProductRepository implements ProductRepositoryInterface
{
    public function selectParentPaginated(int $perPage = 15, array $filters = []): LengthAwarePaginator
    {
        $query = $this->getProducts($filters)
            ->whereNull('parent_id');

        if (Auth::user() && RoleEnum::isInternal(Auth::user()->role_uuid)) {
            return $query->paginate($perPage);
        }

        return $query->where('stock', '>', 0)->paginate($perPage);
    }


    public function selectBySlug($slug, int $perPage = 15, array $filters = []): LengthAwarePaginator
    {
        $category = Category::whereSlug($slug)->firstOrFail();

        $categories = $category->descendants()->pluck('id');
        $categories[] = $category->id;
        $query = Product::withAnyCategories($categories)->whereNull('parent_id');

        if (Auth::user() && RoleEnum::isInternal(Auth::user()->role_uuid)) {
            return $query->paginate($perPage);
        }

        return $query->where('stock', '>', 0)->paginate($perPage);
    }

    public function getPromoted($amount = 5): Collection
    {
        return Product::wherePromoted(true)
            ->where('stock', '>', 0)
            ->inRandomOrder()
            ->limit($amount)
            ->get();
    }

    public function getNewest($amount = 5): Collection
    {
        return Product::where('stock', '>', 0)
            ->whereNull('parent_id')
            ->orderByDesc('id')
            ->limit($amount)
            ->get();
    }

    /**
     * @param int $productId
     *
     * @return Product|Builder
     */
    public function selectByParent(int $productId)
    {
        return Product::whereParentId($productId);
    }

    private function getProducts(array $filters = []): Builder
    {
        $queryBuilder = Product::select('*')
            ->orderBy('created_at', 'desc');

        // Form filters.
        foreach ($filters as $key => $value) {
            $queryBuilder->where($key, $value['operator'], $value['value']);
        }

        return $queryBuilder;
    }
}
