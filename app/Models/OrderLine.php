<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\OrderLine
 *
 * @property int $id
 * @property int $order_id
 * @property int|null $product_id
 * @property string $name
 * @property string $unit_price
 * @property int|null $quantity
 * @property string|null $size
 * @property string|null $color
 * @property string $discount
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|OrderLine newModelQuery()
 * @method static Builder|OrderLine newQuery()
 * @method static Builder|OrderLine query()
 * @method static Builder|OrderLine whereColor($value)
 * @method static Builder|OrderLine whereCreatedAt($value)
 * @method static Builder|OrderLine whereDiscount($value)
 * @method static Builder|OrderLine whereId($value)
 * @method static Builder|OrderLine whereName($value)
 * @method static Builder|OrderLine whereOrderId($value)
 * @method static Builder|OrderLine whereProductId($value)
 * @method static Builder|OrderLine whereQuantity($value)
 * @method static Builder|OrderLine whereSize($value)
 * @method static Builder|OrderLine whereUnitPrice($value)
 * @method static Builder|OrderLine whereUpdatedAt($value)
 * @mixin Eloquent
 * @method static \Database\Factories\OrderLineFactory factory(...$parameters)
 * @property-read mixed $total
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\Product|null $product
 */
class OrderLine extends Model
{
    use HasFactory;

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getTotalAttribute()
    {
        return $this->quantity * $this->unit_price;
    }
}
