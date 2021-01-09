<?php

namespace App\Models;

use Database\Factories\AddressFactory;
use Eloquent;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use PragmaRX\Countries\Package\Countries;

/**
 * App\Models\Address
 *
 * @property int $id
 * @property int $order_id
 * @property string $first_name
 * @property string $last_name
 * @property string $street
 * @property string $number
 * @property string|null $street_extra
 * @property string $zipcode
 * @property string $city
 * @property string $country
 * @property string|null $email
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read string $full_name
 * @method static Builder|Address newModelQuery()
 * @method static Builder|Address newQuery()
 * @method static Builder|Address query()
 * @method static Builder|Address whereCity($value)
 * @method static Builder|Address whereCountry($value)
 * @method static Builder|Address whereCreatedAt($value)
 * @method static Builder|Address whereDeletedAt($value)
 * @method static Builder|Address whereEmail($value)
 * @method static Builder|Address whereFirstName($value)
 * @method static Builder|Address whereId($value)
 * @method static Builder|Address whereLastName($value)
 * @method static Builder|Address whereNumber($value)
 * @method static Builder|Address whereOrderId($value)
 * @method static Builder|Address whereStreet($value)
 * @method static Builder|Address whereStreetExtra($value)
 * @method static Builder|Address whereUpdatedAt($value)
 * @method static Builder|Address whereZipcode($value)
 * @mixin Eloquent
 * @method static AddressFactory factory(...$parameters)
 * @property int|null $user_id
 * @property-read string $country_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \App\Models\User|null $user
 * @method static Builder|Address whereUserId($value)
 */
class Address extends Model
{
    use HasFactory;


    public function getFullNameAttribute(): string
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function getCountryNameAttribute(): string
    {
        $countries = new Countries();

        try {
            return $countries->where('cca3', $this->country)->first()->name->common;
        } catch (Exception) {
            return '';
        }
    }

    public static function getLivewireCreateRules()
    {
        return [
            'address.first_name' => ['required', 'string', 'max:255'],
            'address.last_name' => ['required', 'string', 'max:255'],
            'address.street' => ['required', 'string', 'max:255'],
            'address.number' => ['required', 'string', 'max:255'],
            'address.street_extra' => ['nullable', 'string', 'max:255'],
            'address.zipcode' => ['required', 'string', 'max:255'],
            'address.city' => ['required', 'string', 'max:255'],
            'address.email' => ['sometimes', 'required', 'email', 'string', 'max:255'],
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
