<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Rinvex\Categories\Traits\Categorizable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property int|null $parent_id
 * @property array|null $name
 * @property array|null $description
 * @property string|null $unit_price
 * @property int|null $stock
 * @property string|null $size
 * @property string|null $color
 * @property string|null $color_code
 * @property string|null $discount
 * @property int|null $cost
 * @property int $promoted
 * @property string $uuid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read array $translations
 * @property-read MediaCollection|\App\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read Product|null $parent
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereColor($value)
 * @method static Builder|Product whereColorCode($value)
 * @method static Builder|Product whereCost($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereDeletedAt($value)
 * @method static Builder|Product whereDescription($value)
 * @method static Builder|Product whereDiscount($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product whereParentId($value)
 * @method static Builder|Product wherePromoted($value)
 * @method static Builder|Product whereSize($value)
 * @method static Builder|Product whereStock($value)
 * @method static Builder|Product whereUnitPrice($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @method static Builder|Product whereUuid($value)
 * @mixin Eloquent
 * @method static \Database\Factories\ProductFactory factory(...$parameters)
 * @property \Kalnoy\Nestedset\Collection|\Rinvex\Categories\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @method static Builder|Product withAllCategories($categories)
 * @method static Builder|Product withAnyCategories($categories)
 * @method static Builder|Product withCategories($categories)
 * @method static Builder|Product withoutAnyCategories()
 * @method static Builder|Product withoutCategories($categories)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderLine[] $orderLines
 * @property-read int|null $order_lines_count
 */
class Product extends Model implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;
    use Categorizable;

    public $translatable = [
        'name',
        'description',
        'color',
        'size'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumbnail')
            ->quality(70)
            ->withResponsiveImages();
    }

    public static function getLivewireCreateRules()
    {
        return [
            'name_nl' => ['required'],
            'name_fr' => ['required'],
            'name_en' => ['required'],
            'desc_nl' => ['required'],
            'desc_fr' => ['required'],
            'desc_en' => ['required'],
            'promoted' => ['present', 'boolean'],
            'products.*.unit_price' => ['required', 'numeric', 'max:99999,99'],
            'products.*.stock' => ['required', 'integer', 'max:265535'],
            'products.*.size.nl' => ['required', 'string', 'max:255'],
            'products.*.size.fr' => ['required', 'string', 'max:255'],
            'products.*.size.en' => ['required', 'string', 'max:255'],
            'products.*.color.nl' => ['required', 'string', 'max:255'],
            'products.*.color.en' => ['required', 'string', 'max:255'],
            'products.*.color.fr' => ['required', 'string', 'max:255'],
            'products.*.color_code' => ['required', 'string', 'max:7'],
            //'products.*.discount' => ['required', 'numeric', 'max:100'],
            'products.*.cost' => ['required', 'numeric', 'max:255'],
            'photos.*' => ['nullable']
        ];
    }

    public function parent()
    {
        return $this->hasOne(Product::class, 'id', 'parent_id');
    }

    public function orderLines(): HasMany
    {
        return $this->hasMany(OrderLine::class);
    }
}
