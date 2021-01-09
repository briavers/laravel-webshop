<?php

namespace App\Models;

use App\Models\Enums\OrderStatusEnum;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;


/**
 * App\Models\Order
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $number
 * @property string $status
 * @property string|null $payment_id
 * @property string $total_inclusive
 * @property string $total_exclusive
 * @property string $total_vat
 * @property int $present
 * @property string|null $paid_at
 * @property string|null $shipped_at
 * @property string|null $received_at
 * @property string|null $cancelled_at
 * @property string|null $disputed_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Address|null $address
 * @property-read mixed $description
 * @property-read mixed $status_enum
 * @property-read Collection|OrderLine[] $orderLines
 * @property-read int|null $order_lines_count
 * @property-read User|null $user
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @method static Builder|Order whereCancelledAt($value)
 * @method static Builder|Order whereCreatedAt($value)
 * @method static Builder|Order whereDisputedAt($value)
 * @method static Builder|Order whereId($value)
 * @method static Builder|Order whereNumber($value)
 * @method static Builder|Order wherePaidAt($value)
 * @method static Builder|Order wherePaymentId($value)
 * @method static Builder|Order wherePresent($value)
 * @method static Builder|Order whereReceivedAt($value)
 * @method static Builder|Order whereShippedAt($value)
 * @method static Builder|Order whereStatus($value)
 * @method static Builder|Order whereTotalExclusive($value)
 * @method static Builder|Order whereTotalInclusive($value)
 * @method static Builder|Order whereTotalVat($value)
 * @method static Builder|Order whereUpdatedAt($value)
 * @method static Builder|Order whereUserId($value)
 * @mixin Eloquent
 * @method static \Database\Factories\OrderFactory factory(...$parameters)
 * @property int|null $address_id
 * @method static Builder|Order whereAddressId($value)
 */
class Order extends Model
{
    use HasFactory;

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderLines(): HasMany
    {
        return $this->hasMany(OrderLine::class);
    }

    public function getStatusEnumAttribute()
    {
        return new OrderStatusEnum($this->status);
    }

    public function getDescriptionAttribute()
    {
        return "Order #" . $this->number;
    }
}
